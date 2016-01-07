<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PartnerCards extends Model {
    protected $table = 'partner_card';
    public $timestamps = false;
    protected $fillable = array('partner_id','card_id');
}



