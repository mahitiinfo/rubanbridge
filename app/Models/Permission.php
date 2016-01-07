<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Group;
use Auth;
class Permission extends Model {

    protected $table = 'permissions';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = array('name','permissions');
    /**
     * Mutator for taking permissions.
     *
     * @author   Steve Montambeault
     * @link     http://stevemo.ca
     *
     * @param $permissions
     *
     * @return void
     */
    public static function getper($permissions)
    {
        $module = lcfirst(@$permissions['name']);
        $roles = array();
        if(@$permissions['permissions']) {
        //prefix the permission with the module name ex: user.create
        foreach ($permissions['permissions'] as $value)
        {
        
            $roles[] = $module . '.' . $value;
        }
}
        $permission = ( ! empty($roles)) ? json_encode($roles) : '';
        return $permission;
    }
    public static function formatpermission($input)
    {
    $permissions=json_decode($input);
    if($permissions)
    {
    return Permission::toArrayn($permissions);
    }
    else
    {
    return array();
    }
    }
    public static function toArrayn($obj)
        {
                if(is_object($obj))  { 
                        $obj = (array) $obj;
                }
                
                if(is_array($obj)) {
                        $new = array();
                        foreach($obj as $key=>$val) {
                        $new[$key] = static::toArrayn($val);
                        }
                }
                else
                {
                $new = $obj;
                }
                return $new;
        }
        
        public static function hasPermission($permissions,$all=true)
    {
    $return=true;
    $user = Auth::user();
    $mergedPermissions = Group::getMergedPermissions($user);
    if(isset($mergedPermissions['superuser']) && $mergedPermissions['superuser']==1)
    {
    return true;
    }

        if ( ! is_array($permissions))
        {
            $permissions = (array) $permissions;
        }

        foreach ($permissions as $permission)
        {
            // We will set a flag now for whether this permission was
            // matched at all.
            $matched = true;

            // Now, let's check if the permission ends in a wildcard "*" symbol.
            // If it does, we'll check through all the merged permissions to see
            // if a permission exists which matches the wildcard.
            if ((strlen($permission) > 1) && ends_with($permission, '*'))
            {
                $matched = static::format_perm1($mergedPermissions,$permission);
                break;
                
            }

            elseif ((strlen($permission) > 1)  &&  starts_with($permission, '*'))
            {
                $matched = static::format_perm($mergedPermissions,$permission);
                break;
            }

            else
            {
                $matched = static::format_permission($mergedPermissions,$permission);
                break;
            }

            // Now, we will check if we have to match all
            // permissions or any permission and return
            // accordingly.
            if ($all === true  &&  $matched === false)
            {
                $return= false;
            }
            elseif ($all === false  &&  $matched === true)
            {
                $return= true;
            }
        }

        if ($all === false)
        {
            $return= false;
        }

        return $return;
    }
    
    public static function format_permission($mergedPermissions,$permission)
    {
    $matched = false;
                
                if(!empty($mergedPermissions)) 
                {

                foreach ($mergedPermissions as $mergedPermission => $value)
                {
                    // This time check if the mergedPermission ends in wildcard "*" symbol.
                    if ((strlen($mergedPermission) > 1)  &&  ends_with($mergedPermission, '*'))
                    {
                        $matched = false;

                        // Strip the '*' off the end of the permission.
                        $checkMergedPermission = substr($mergedPermission, 0, -1);

                        // We will make sure that the merged permission does not
                        // exactly match our permission, but starts with it.
                        if ($checkMergedPermission != $permission  &&  starts_with($permission, $checkMergedPermission)  &&  $value == 1)
                        {
                            $matched = true;
                            break;
                        }
                    }

                    // Otherwise, we'll fallback to standard permissions checking where
                    // we match that permissions explicitly exist.
                    elseif ($permission == $mergedPermission  &&  $mergedPermissions[$permission] == 1)
                    {
                        $matched = true;
                        break;
                    }
                }
                }
                return $matched;
    }
    public static function format_perm($mergedPermissions,$permission)
    {
        $matched = false;

                foreach ($mergedPermissions as $mergedPermission => $value)
                {
                    // Strip the '*' off the beginning of the permission.
                    $checkPermission = substr($permission, 1);

                    // We will make sure that the merged permission does not
                    // exactly match our permission, but ends with it.
                    if ($checkPermission != $mergedPermission  &&  ends_with($mergedPermission, $checkPermission)  &&  $value == 1)
                    {
                        $matched = true;
                        break;
                    }
                }
                return $matched;
                }
                public static function format_perm1($mergedPermissions,$permission)
    {
        $matched = false;

               foreach ($mergedPermissions as $mergedPermission => $value)
                {
                    // Strip the '*' off the end of the permission.
                    $checkPermission = substr($permission, 0, -1);

                    // We will make sure that the merged permission does not
                    // exactly match our permission, but starts with it.
                    if ($checkPermission != $mergedPermission && starts_with($mergedPermission, $checkPermission)  &&  $value == 1)
                    {
                        $matched = true;
                        break;
                    }
                }
                return $matched;
                }
                
                public static function construct_perm($mergedPermissions,$permission)
                {
                // We will set a flag now for whether this permission was
            // matched at all.
            $matched = true;

            // Now, let's check if the permission ends in a wildcard "*" symbol.
            // If it does, we'll check through all the merged permissions to see
            // if a permission exists which matches the wildcard.
            if ((strlen($permission) > 1) && ends_with($permission, '*'))
            {
                $matched = static::format_perm1($mergedPermissions,$permission);
                break;
                
            }

            elseif ((strlen($permission) > 1)  &&  starts_with($permission, '*'))
            {
                $matched = static::format_perm($mergedPermissions,$permission);
                break;
            }

            else
            {
                $matched = static::format_permission($mergedPermissions,$permission);
                break;
            }
            return $matched;
                }
    
}
