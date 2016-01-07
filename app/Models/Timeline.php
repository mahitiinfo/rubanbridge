<?php
/*
   * timeline for each action from the project, card and camp level, its storing the each action to the given module
   *
   * Manage the all function to get the timeline 
   *
   * @var string
   */
   
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Timeline extends Model {
/*
   * The database table used by the model.
   *
   * @var string
   */
   
    protected $table = 'timeline';
    /*
   * The timestamps created by the model(created at and updated_at) while insert or update the table used by the model.
   *
   * @var timestamps
   */
    public $timestamps = true;
    /*
   * Defines the fields name that can be inserted into the table
   *
   * @var string
   */
    protected $fillable = array('object_type','object_id','action','description');
    
    /*
   * Construct the final timeline for the specified project
   
   * params @int $id. @int $type, $action @string
   *
   * return mixed
   */
        public static function getFinalTimeline($id,$type)
        {
            /*
            * Get final timeline for the specified project

            * params @int $id. @int $type, $action @string
            *
            * return mixed
            */
            $timelines= static::getTimeline($id,$type);
            /*
            * Merge the project timeline to the camp timeline
            
            * the timeline will merged to the camp under each project

            * params @int $id. @int $type, $action @string
            *
            * return mixed
            */
            $projecttimeline=static::mergeProjectTocard($timelines);
            $finalarray=array_merge($timelines,$projecttimeline);
            $newarray=static::sortArray($finalarray);
            ksort($newarray);
            $times=array_reverse($newarray);
            /*
            * Final construct for the timeline
            
            * Sorting the array of the timeline for the date wise

            * params @array $array
            *
            * return sortyby date
            */
            return static::sortByDate($times);
        }
        /*
        * Construct the final timeline for the specified project

        * params @int $id. @int $type, $action @string
        *
        * return mixed
        */
   
        public static function getTimeline($id,$type)
        {
            $timeline= Timeline::select('timeline.*','projects.name','cards.id as cid');
            $timeline ->join('projects', function($join) use ($id,$type)
            {
            $join->on('projects.id', '=', 'timeline.object_id')
            ->where('object_type', '=', $type)->where('object_id','=',$id);
            });
            $timeline ->leftjoin('cards', function($join) use ($type)
            {
            $join->on('projects.id', '=', 'cards.project_id');

            });
            return $timeline->orderby('timeline.created_at','asc')->get()->toArray();
        }
        /*
        * Construct the array as datewise
        
        * returns the result with grouped by the date

        * params @array 
        *
        * return mixed
        */
        public static function sortByDate($times)
        {
            $timearray=array();
            foreach($times as $time)
            {
            $timearray[date('d-m-Y',strtotime($time['created_at']))][]=$time;
            }
            return $timearray;
        }
        /*
            * Construct the array as timeline key wise sory by asending order
            
            * returns the result with grouped by the id

            * params @array 
            *
            * return mixed
            */
        public static function sortArray($finalarray)
        {
            $newarray=array(); 
            foreach($finalarray as $final)
            {
                $newarray[$final['id']]=$final;
            }
            return $newarray;
        }
        /*
            * Merge the project with the card level activities
            *
            * params @array 
            *
            * return mixed
            */
        public static function mergeProjectTocard($timelines)
        {
            $projecttimeline=array();
            foreach($timelines as $cctimeline)
            {
                /*
                * Get the each activity of the each specified card

                * params @int $cardid 
                *
                * return mixed
                */
                $card=static::getCardTimeline($cctimeline['cid'],2);
                $projecttimeline=array_merge($projecttimeline,$card);
            }
            return $projecttimeline;
        }
        /*
            * Get the timeline for the card
            
            * params @int cardid, type and action 
            *
            * return mixed
            */
        public static function getCardTimeline($cctimeline,$type)
        {
            $ctimeline= Timeline::select('timeline.*','cards.name','camps.id as caid');
            $ctimeline ->join('cards', function($join) use ($cctimeline,$type)
            {
                $join->on('cards.id', '=', 'timeline.object_id')
                ->where('object_type', '=',$type)->where('object_id','=',$cctimeline);
            });
            $ctimeline ->leftjoin('camps', function($join) use ($type)
            {
                $join->on('cards.id', '=', 'camps.card_id');

            });
            $ctimelines=$ctimeline->orderby('timeline.created_at','asc')->get()->toArray();
            $assignarray=array();
            
            
            foreach($ctimelines as $astimeline)
            {
                /*
                * Get the timeline for assigned to the parners
                
                * params @int cardid, type and action 
                *
                * return mixed
                */
                $assing=static::getAssingTimeline($cctimeline,3);
                $assignarray=array_merge($assignarray,$assing);
            }
            $assignarray=array_merge($ctimelines,$assignarray);
            
            
            $camparray=array();
            foreach($ctimelines as $astimeline)
            {
                /*
                * Get the timeline for the camp of the each card
                
                * params @int cardid, type and action 
                *
                * return mixed
                */
                $camptime=static::getCampTimeline($astimeline['caid'],4);
                $camparray=array_merge($camparray,$camptime);
            }
            
            return array_merge($assignarray,$camparray);
        }
        /*
            * Get the timeline for the card that assigned to someone
            
            * params @int cardid, type and action 
            *
            * return mixed
            */
        public static function getAssingTimeline($cctimeline,$type)
        {
            $actimeline= Timeline::select('timeline.*','partner_card.partner_id');
            $actimeline ->join('partner_card', function($join) use ($cctimeline,$type)
            {
            $join->on('partner_card.card_id', '=', 'timeline.object_id')
            ->where('object_type', '=', $type)->where('object_id','=',$cctimeline);
            });
            return $actimeline->orderby('timeline.created_at','asc')->get()->toArray();
        }
        /*
            * Get the timeline for the camp
            
            * params @int cardid, type and action 
            *
            * return mixed
            */
        public static function getCampTimeline($astimeline,$type)
        {
            $camptimeline= Timeline::select('timeline.*','camps.name');
            $camptimeline ->join('camps', function($join) use ($astimeline,$type)
            {
            $join->on('camps.id', '=', 'timeline.object_id')
            ->where('object_type', '=', $type)->where('object_id','=',$astimeline);
            });
            return $camptimeline->orderby('timeline.created_at','asc')->get()->toArray();
        }
        /*
        * Construct the final timeline for the specified project

        * params @int $id. @int $type, $action @string
        *
        * return mixed
        */
        public static function getFinalCardTimeline($id,$type)
        {
            /*
            * Get final timeline for the specified project

            * params @int $id. @int $type, $action @string
            *
            * return mixed
            */
            $timelines= static::getCardTimeline($id,$type);
            /*
            * Construct the array as timeline key wise sory by asending order
            
            * returns the result with grouped by the id

            * params @array 
            *
            * return mixed
            */
            $newarray=static::sortArray($timelines);
            ksort($newarray);
            $times=array_reverse($newarray);
            /*
            * Final construct for the timeline
            
            * Sorting the array of the timeline for the date wise

            * params @array $array
            *
            * return sortyby date
            */
            return static::sortByDate($times);
        }
}
