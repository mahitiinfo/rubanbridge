<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Village extends Model {
    protected $table = 'village';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = array('id','district_id','taluk_id','population','stcode','dtcode','taluk','village','sdtcode','tvcode','malepopulation','femalepopulation','geoPoint');
    public static function get_locations($sid,$state,$did=false,$tid=false)
    {
     $data=Village::select([DB::raw('AsText(geoPoint) AS location,district,taluk,village,population,malepopulation,femalepopulation')]);
     $data->join('village_sector','village_id','=','village.id','left');
     $data->join('taluk','taluk.id','=','village.taluk_id','left');
     $data->join('district','district.id','=','taluk.district_id','left');
     $data->join('state','state.id','=','district.state_id','left');
     $data->where('state_id',$state);
     if($did)
     {
     $data->where('taluk.district_id',$did);
     }
     if($tid)
     {
     $data->where('taluk_id',$tid);
     }
     $data->where('sector_id',$sid);
     return $data->get();
    }

}



