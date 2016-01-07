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
class Camp extends Model {
/**
   * The database table used by the model.
   *
   * @var string
   */
    protected $table = 'camps';
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
    protected $fillable = array('card_id','name', 'start_date', 'end_date','address','active','no_of_people','target','geoPoint','document','status','budget','order','comments','actual_budget','actual_orders',
    'deliver_time','actual_deliver_time','no_of_villages_covered','order_value','udpated_date','village_details');
    /**
   * Get the camp details for the specified camps array   
   * params @int $id
   *
   * return array
   */
    public static function get_list_card($cards)
    {
        $options=array();
        foreach($cards as $card)
        {
        $options[$card->id]=$card->name;
        }
        return $options;
    }
    /**
   * Upload the file for the camp
   
   * params @request, file
   *
   * return response
   */
    public static function upload_file($request,$file,$files=false)
    {
    
    if ($request->hasFile($file)) {
                $destinationPath = base_path()."/uploads/camp/";
                $filename = $request->file($file)->getClientOriginalName();
                $extension = $request->file($file)->getClientOriginalExtension();
                $fileName = static::gen_uuid().'.'.$extension;
                 $return['fileName']=$fileName;
                $return['filePath']='/uploads/camp/'.$fileName;
                $return['fileSize']=$request->file($file)->getSize();
                $return['fileType']=$request->file($file)->getMimeType();
                $return['fileExtension']=$extension;
                $return['fileOriginalName']=$filename;
                $request->file($file)->move($destinationPath,$destinationPath.$fileName,0777);
                chmod($destinationPath.$fileName,0777);
                
               $files=json_encode($return);
               
                
        }
        return $files;
    }
    /**
   * generates the 32 bit unique id
   
   * params @void
   *
   * return string
   */
    public static function gen_uuid()
    {
        return sprintf('%04x%04x%04x%04x%04x%04x%04x%04x', 
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), 
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff), 
            // 16 bits for "time_hi_and_version", 
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000, 
            // 16 bits, 8 bits for "clk_seq_hi_res", 
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000, 
            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }
    
}
