<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PartnerDistrict extends Model {
    protected $table = 'partner_district_sector';
    public $timestamps = false;
    protected $fillable = array('partner_id','district_id','sector_id');
    
    public static function get_districts($results)
    {
    $ids=array(); 
        if(!empty($results))
        {
            foreach($results as $result)
            {
                $ids[]=$result->district_id;
            }
        }
        return $ids;
    }
    public static function get_sectors($results)
    {
    $ids=array(); 
        if(!empty($results))
        {
            foreach($results as $result)
            {
                $ids[]=$result->sector_id;
            }
        }
        return $ids;
    }
    
    public static function get_districts_selected($id)
    {
        $district=PartnerDistrict::select('district','name');
        $district->join('district','district_id','=','district.id','left');
        $district->join('sector','sector_id','=','sector.id','left');
        $district->where('partner_id',$id);
        return $district->get()->toArray();
    }
    public static function format_selected($districtsselected)
    {
    $array=array();
    
    foreach($districtsselected as $district)
    {
    $array[$district['district']][]=$district['name'];
    }
    return $array;
    }
}



