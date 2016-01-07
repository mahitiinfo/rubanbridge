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
    protected $fillable = array('name','sector_id','district_id', 'camps', 'deliver_time', 'start_date', 'end_date','comments','image','active','total_villagers','orders','budget','status');
     /**
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
    /**
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
    /**
   * Get the project details by specified project id
   
   * params @int $id
   *
   * return array
   */
    public static function get_project($id=false)
    {
        $project =Project::select('projects.*','sector.name as sectorname','district.district as districtname','sector.name as sectorname');
        $project ->join('sector','projects.sector_id','=','sector.id');
        $project ->join('district','projects.district_id','=','district.id');
        if($id)
        {
        $project->where('projects.id',$id);
        }
        return $project->first();
        
    }
    /**
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
        $project->orderby('projects.id','desc');
        return $project->get();
        
    }
    /**
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
    /**
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
}
