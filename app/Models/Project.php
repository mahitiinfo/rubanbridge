<?php
/**
   * Manage the projects module
   *
   * @var string
   */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Auth;

class Project extends Model {
/**
   * The database table used by the model.
   *
   * @var string
   */
    protected $table = 'projects';
     /**
   * The timestamps created by the model(created at and updated_at) while insert or update the table used by the model.
   *
   * @var timestamps
   */
    public $timestamps = true;
    /**
   * Managing the soft deletes by the table.
   *
   * @var timestamps
   */

    use SoftDeletes;

    protected $dates = ['deleted_at']; /**
   * Defines the fields name that can be inserted into the table
   *
   * @var string
   */
    protected $fillable = array('name','sector_id','district_id', 'camps', 'deliver_time', 'start_date', 'end_date','comments','image','active','total_villagers','orders','budget','status',
    'added_by','update_by','payment_status','state_id','taluk_id','payment_date');
     /*
   * Upload the file for specified the project
   
   * params @array $file,$filename, existfile
   *
   * return filename
   */
    public static function upload_projectfile($request,$pfile,$pfilename=false)
    {
        if ($request->hasFile($pfile)) {
                $pdestinationPath = base_path()."/uploads/projects/";
                $pfilename = $request->file($pfile)->getClientOriginalName();
                $request->file($pfile)->move($pdestinationPath,$pdestinationPath.$pfilename,0777);
                chmod($pdestinationPath.$pfilename,0777);
        }
        return $pfilename;
    }
    /*
   * Get the goal completion for the specified project
   
   * params @int $id
   *
   * return array
   */
    public static function get_goals($id)
    {
        $goals =Project::select(DB::Raw('sum(rb_cards.budget) as avgbudget'),DB::Raw('sum(rb_cards.camps) as avgcamps'),DB::Raw('sum(rb_cards.total_villagers) as avgtotal_villagers'),DB::Raw('sum(rb_cards.orders) as avgorders'),DB::Raw('avg(rb_cards.deliver_time) as avgdeliver_time'));
        $goals ->join('cards','cards.project_id','=','projects.id');
        $goals->where('projects.id',$id);
        return $goals->first();
    }
    /*
   * Get the project details by specified project id
   
   * params @int $id
   *
   * return array
   */
    public static function get_project($id=false)
    {
        $project =Project::select('projects.*','sector.name as sectorname','district.district as districtname','sector.name as sectorname','state','taluk');
        $project ->join('sector','projects.sector_id','=','sector.id','left');
        $project ->join('district','projects.district_id','=','district.id','left');
        $project ->join('state','projects.state_id','=','state.id','left');
        $project ->join('taluk','projects.taluk_id','=','taluk.id','left');
        if($id)
        {
        $project->where('projects.id',$id);
        }
        return $project->first();
        
    }
    /*
   * Get the project details by specified project id
   
   * params @int $id
   *
   * return array
   */
    public static function get_projects($status=false)
    {
        $project =Project::select('projects.*','sector.name as sectorname','district.district as districtname','sector.name as sectorname');
        $project ->join('sector','projects.sector_id','=','sector.id');
        $project ->join('district','projects.district_id','=','district.id');
        $project->where('projects.status',$status);
          $project->where('projects.active','1');
        if(Auth::user()->group_id==2)
        {
        $project->where('added_by',Auth::user()->id);
        }
        $project->orderby('projects.id','desc');
        return $project->get();
        
    }
    /*
   * Get the completed camps goals details of the cards for specified project
   
   * params @int $id
   *
   * return array
   */
     public static function get_camp_goals($id)
    {
        $camp_goals =Project::select(DB::Raw('sum(rb_camps.actual_budget) as budget'),DB::Raw('count(rb_camps.id) as camps'),DB::Raw('sum(rb_camps.no_of_people) as total_villagers'),DB::Raw('sum(rb_camps.actual_orders) as orders'),DB::Raw('avg(rb_camps.actual_deliver_time) as deliver_time'));
        $camp_goals ->join('cards','cards.project_id','=','projects.id');
        $camp_goals ->join('camps','camps.card_id','=','cards.id');
        $camp_goals->where('projects.id',$id);
         $camp_goals->whereIn('camps.status',array('1','2'));
        return $camp_goals->first();
    }
    /*
   * Get the completed camps goals details of the cards for specified project
   
   * params @int $id
   *
   * return array
   */
     public static function get_camp_planned_goals($id)
    {
       $planned_goals =Project::select(DB::Raw('sum(rb_camps.budget) as budget'),DB::Raw('count(rb_camps.id) as camps'),DB::Raw('sum(rb_camps.no_of_people) as total_villagers'),DB::Raw('sum(rb_camps.order) as orders'),DB::Raw('avg(rb_camps.deliver_time) as deliver_time'));
        $planned_goals ->join('cards','cards.project_id','=','projects.id');
        $planned_goals ->join('camps','camps.card_id','=','cards.id');
        $planned_goals->where('projects.id',$id);
        return $planned_goals->first();
    }
    public static function get_statics()
    {
     $static_goals =Project::select(DB::Raw('sum(rb_projects.budget) as budget'),DB::Raw('sum(rb_projects.orders) as orders'),DB::Raw('sum(rb_projects.total_villagers) as total_villagers'));
             return $static_goals->first();
    }
    
    /*
    
     * Get the completed camps goals details of the cards for specified project
   
   * params @int $id
   *
   * return array
    
    */
    
    public static function get_payouts($status=2,$pay=false)
    {
    $finalarray=array();
       $projects= static::get_projectpayouts($status,$pay);
       foreach($projects as $project)
       {
        $cards=Card::where('project_id',$project['id'])->get()->toArray();
        $total=static::get_cardpayouts($project['id']);
        $actual=static::get_cardpayouts($project['id'],1);
        if($total==$actual)
        {
            $completedcamps=static::get_campstatus($cards);
            $final=static::format_payouts($completedcamps);
            if($final)
            {
              $dispute=  Dispute::where('project_id',$project['id'])->where('status',0)->count();
              $project['dispute']=$dispute;
                $finalarray[]=$project;
            }
        }
        
       }
       return $finalarray;
    }
    /*
    
     * Get the completed camps goals details of the cards for specified project
   
   * params @int $id
   *
   * return array
    
    */
    
    public static function format_payouts($completedcamps)
    {
       $return['total']=0;
       $return['actual']=0;
       foreach($completedcamps as $completed)
       {
        $return['total']=$return['total'] + $completed['total'] ;
        $return['actual']=$return['actual'] + $completed['actual'] ;
       }
       if($return['total']==$return['actual'] && $return['actual']<>0 && $return['total']<>0)
       {
       return true;
       }
       else
       {
       return false;
       }
    }
    /*
    
     * Get the completed camps goals details of the cards for specified project
   
   * params @int $id
   *
   * return array
    
    */
    
    public static function get_campstatus($cards)
    {
       foreach($cards as $card)
       {
        $total=static::get_camppayouts($card['id']);
        $actual=static::get_camppayouts($card['id'],1);
        $return[$card['id']]['total']=$total;
        $return[$card['id']]['actual']=$actual;
       }
       return $return>get()->toArray();;
    }
    
    public static function get_projectpayouts($status=2,$pay='')
    {
    
        $payouts =Project::select('projects.name','payment_status','payment_date','id');
        if($pay)
        {
        $payouts->where('payment_status',0);
        }
        $payouts->where('projects.status',$status);
      return $payouts;
    }
    
    /*
    
     * Get the completed camps goals details of the cards for specified project
   
   * params @int $id
   *
   * return array
    
    */
    
    public static function get_cardpayouts($project_id,$status=false)
    {
        $cardpayouts =Card::where('project_id',$project_id);
        if($status)
        {
        $cardpayouts->where('status',$status);
        }
        return $cardpayouts->count();
    }
    
    /*
    
     * Get the completed camps goals details of the cards for specified project
   
   * params @int $id
   *
   * return array
    
    */
    
    public static function get_camppayouts($card_id,$status=false)
    {
         $camppayouts =Camp::where('card_id',$card_id);
        if($status)
        {
        $camppayouts->where('status',$status);
        }
        return $camppayouts->count();
    }
    /*
    
     * Get the completed camps goals details of the cards for specified project
   
   * params @int $id
   *
   * return array
    
    */
    
    public static function get_projects_bylogin()
    {
        $project=Project::select('name','id','active','status');
        if(Auth::user()->group_id==2)
        {
        $project->where('added_by',Auth::user()->id);
        }
        return $project->get();
    }
    
    
    
    
}
