<?php
/**
   * Manage the cards module
   *
   * @var string
   */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use Auth;
use DB;
class Dispute extends Model {
/**
   * The database table used by the model.
   *
   * @var string
   */
    protected $table = 'disputes';
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
    /**
   * Defines the fields name that can be inserted into the table
   *
   * @var string
   */
    protected $fillable = array('project_id','status','reason','added_by','updated_by','textarea','operator_remarks','description');
    
    public static function get_disputes($id=false)
    {
    $dispute=Dispute::select('disputes.*','projects.name');
    if($id)
    {
    $dispute->where('project_id',$id);
    $dispute->where('disputes.status',0);
    }
    $dispute->where('payment_status',0);
    $dispute->join('projects','projects.id','=','project_id');
    return $dispute->get()->toArray();
    }
    /*
    
    */
    public static function getlists($resutls)
    {
    $newarray=array();
    foreach($resutls as $result)
    {
    $newarray[$result['id']]=$result['name'];
    }
    return $newarray;
    }
}
