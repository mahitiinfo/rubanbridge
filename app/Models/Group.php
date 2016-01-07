<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Group extends Model {
    protected $table = 'groups';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = array('name','active','permissions');
    
    public static function getMergedPermissions($user)
    {
    $group=Group::find($user->group_id);
    return Permission::toArrayn(json_decode($group->permissions));
    }
    public function user()
    {
    return $this->hasMany('App\Models\User');
    }
}
