<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Model {
    protected $table = 'users';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = array('name','first_name','last_name','email','password','group_id','active','permissions','company_name','address','pancard','image');
    
    public function group()
    {
        return $this->belongsTo('App\Models\Group','group_id','id');
    }
    
    public static function getMergedPermissions($user)
    {
    return Permission::toArrayn(json_decode($user->permissions));
    }
    
    public static function upload_userfile($request,$ufile,$ufilename=false)
    {
        if ($request->hasFile($ufile)) {
                $udestinationPath = base_path()."/uploads/users/";
                $ufilename = $request->file($ufile)->getClientOriginalName();
                $request->file($ufile)->move($udestinationPath,$udestinationPath.$ufilename,0777);
                chmod($udestinationPath.$ufilename,0777);
        }
        return $ufilename;
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
