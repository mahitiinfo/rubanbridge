<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\User;
use App\Models\Permission;
use Session;
use Carbon;
class GroupController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
   $data['groups'] =Group::all();
  $data['createbtn']=Permission::hasPermission('groups.create');
  $data['editbtn']=Permission::hasPermission('groups.edit');
   $data['deletebtn']=Permission::hasPermission('groups.delete');
   return view('groups.index',$data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $data['permissions']=Permission::all();
      $data['userPermissions']=array();
      $data['listbtn']=Permission::hasPermission('groups.index');
      return view('groups.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(GroupRequest $request)
  {
    $input = $request->all();
    $newpermission=false;
    $permissions            = $request->get('permissions');
    $newpermission=static::format_per($permissions);
              $input['permissions']=( ! empty($newpermission)) ? json_encode($newpermission) : '';
              Group::create($input);
              Session::flash('success', Lang::get('ruban.group.created'));
              return Redirect::route('ruban.groups.index');
  }

public static function format_per($permissions)
{
$newpermission=false;
     if($permissions['superuser']==1)
      {
        $newpermission=array('superuser'=>1);
      }
       else
       {
              if(!empty($permissions))
              {
                    foreach($permissions as $key=>$permission)
              {
                      if($permission)
                      {
                      $newpermission[str_replace("-",".",$key)]=$permission;
                      }
              }
              }
           }
           return $newpermission;
}
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
  $group=Group::find($id);
    if($group){
    return view('groups.view', ['group' =>$group ]);
    }
    else
    {
    Session::flash('danger', Lang::get('ruban.group.notfound'));
    return Redirect::route('ruban.groups.index');
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $data['group']=$group=Group::find($id);
    if($group)
    {
      $data['permissions']=Permission::all();
      $data['userPermissions']=Permission::formatpermission($group->permissions);
     $data['cancelbtn']=Permission::hasPermission('groups.index'); 
      return view('groups.edit', $data);
    }
    else
    {
    Session::flash('danger', Lang::get('ruban.group.notfound'));
    return Redirect::route('ruban.groups.index');
    }
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(GroupRequest $request,$id)
  {
        $group = Group::find($id);
        if($group)
        {
            $input = $request->all();
            $permissions            = $request->get('permissions');
            $newpermission=static::format_per($permissions);
        $input['permissions']=( ! empty($newpermission)) ? json_encode($newpermission) : '';
        $group->fill($input);
        $group->save();
        Session::flash('success', Lang::get('ruban.group.updated'));
        return Redirect::route('ruban.groups.index');
        }
        else
        {
        Session::flash('danger', Lang::get('ruban.group.notfound'));
        return Redirect::route('ruban.groups.index');
        }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $group = Group::find($id);
    if($group){
        $group->delete();
        Session::flash('success', Lang::get('ruban.group.deleted'));
        return Redirect::route('ruban.groups.index');
    }
    else
    {
        Session::flash('danger', Lang::get('ruban.group.notfound'));
        return Redirect::route('ruban.groups.index');
    }
    
  }
  
}

