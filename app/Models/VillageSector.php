<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class VillageSector extends Model {
    protected $table = 'village_sector';
    public $timestamps = false;
    protected $fillable = array('village_id','sector_id');
}



