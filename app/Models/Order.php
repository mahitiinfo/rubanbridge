<?php
/**
   * Manage the camp module
   *
   * @var string
   */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Order extends Model {
/**
   * The database table used by the model.
   *
   * @var string
   */
    protected $table = 'orders';
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
    protected $fillable = array('camp_id','order_id','warehouse','ship_date','status','order_amount',
    'actual_time_to_deliver','payment_method','associate','address_type','address');
    
}
