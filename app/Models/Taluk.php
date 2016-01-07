<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Taluk extends Model {
    protected $table = 'taluk';
    public $timestamps = true;
    protected $fillable = array('id','district_id','taluk');
}



