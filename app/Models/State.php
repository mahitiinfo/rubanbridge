<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class State extends Model {
    protected $table = 'state';
    public $timestamps = true;
    protected $fillable = array('id','state');
}



