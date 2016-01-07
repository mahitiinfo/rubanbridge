<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Redirect;
use Route;
use App\Models\Permission;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest() && $request->ajax()) {
                return response('Unauthorized.', 401);
            } 
        /*
|--------------------------------------------------------------------------
| Admin auth filter
|--------------------------------------------------------------------------
| You need to give your routes a name before using this filter.
| I assume you are using resource. so the route for the UsersController index method
| will be admin.users.index then the filter will look for permission on users.view
| You can provide your own rule by passing a argument to the filter
|
*/
    $userRule=null;
    // no special route name passed, use the current name route
    if ( is_null($userRule) )
    {
        
        $explode=explode('.', Route::currentRouteName());
        if(count($explode)<3)
        {
        $userRule = Route::currentRouteName();
        }
        else
        {
         $userRule = $explode[1].'.'.$explode[2];
        }
    }
    $userRule=str_replace("-",'.',$userRule);
    // no access to the request page and request page not the root admin page
    if ( ! Permission::hasPermission($userRule) && $userRule !== 'ruban.home' )
    {
            
            $redirect['route']='ruban.home';
            $redirect['with']='danger';
            $redirect['message']=trans('ruban.permissions.access_denied');
            
    }
    // no access to the request page and request page is the root admin page
    else if( ! Permission::hasPermission($userRule) && $userRule === 'ruban.home' )
    {
        //can't see the admin home page go back to home site page
            $redirect['route']='auth.logout';
            $redirect['with']='danger';
            $redirect['message']=trans('ruban.permissions.access_denied');
    }
       if(isset($redirect['route']))
       {
       return Redirect::route($redirect['route'])->with($redirect['with'], $redirect['message']);
       } 
        
        return $next($request);
    }
}
