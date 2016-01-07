<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class District extends Model {
    protected $table = 'district';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = array('id','state_id','district');
}



