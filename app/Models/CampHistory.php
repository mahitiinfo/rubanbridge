<?php
/**
   * Manage the camp module
   *
   * @var string
   */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class CampHistory extends Model {
/**
   * The database table used by the model.
   *
   * @var string
   */
    protected $table = 'camps_history';
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
    protected $fillable = array('camp_id','no_of_people','actual_budget','actual_orders',
    'actual_deliver_time','no_of_villages_covered','order_value','updated_date','village_details');
    
}
