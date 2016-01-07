<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PartnerSector extends Model {
    protected $table = 'partner_sector';
    public $timestamps = false;
    protected $fillable = array('partner_id','sector_id');
}



