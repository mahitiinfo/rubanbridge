<?php
/**
   * Manage the camp module
   *
   * @var string
   */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Task extends Model {
/**
   * The database table used by the model.
   *
   * @var string
   */
    protected $table = 'tasks';
    /**
   * The timestamps created by the model(created at and updated_at) while insert or update the table used by the model.
   *
   * @var timestamps
   */
    public $timestamps = true;
    /**
   * Defines the fields name that can be inserted into the table
   *
   * @var string
   */
    protected $fillable = array('card_id','camp_id','description','title','status','order_id','ship_date','status','order_amount',
    'actual_time_to_deliver','payment_method','address_type','address','added_by','updated_by');
    
    public static function get_tasks($card_id=false,$camp_id=false)
    {
        $task=Task::select('tasks.*','cards.name as card','camps.name as camp');
        $task->join('cards','cards.id','=','card_id','left');
        $task->join('camps','camps.id','=','camp_id','left');
        if($card_id)
        {
        $task->where('tasks.card_id',$card_id);
        }
        if($camp_id)
        {
        $task->where('tasks.camp_id',$camp_id);
        }
        return $task->get();
    }
    
}
