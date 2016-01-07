<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Session;
use Carbon;
class PermissionController extends Controller {
protected $permissions='permissions';
protected $success='success';
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $data[$this->permissions]=Permission::all();
      $data['createbtn']=Permission::hasPermission('permissions.create');
      $data['editbtn']=Permission::hasPermission('permissions.edit');
      $data['deletebtn']=Permission::hasPermission('permissions.delete');
      return view('permissions.index', $data);
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  { 
   $data['listbtn']=Permission::hasPermission('permissions.index');
      return view('permissions.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(PermissionRequest $request)
  {
        $input = $request->all();
        $inputn['name'] = ucfirst($request->get('name'));
        $inputn[$this->permissions] = Permission::getper($input);
        Permission::create($inputn);
        Session::flash($this->success, Lang::get('ruban.permission.created'));
        return Redirect::route('ruban.permissions.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $data['permission']=Permission::findOrFail($id);
       return view('permissions.view', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
        $data['permission']=Permission::findOrFail($id);
        $data['cancelbtn']=Permission::hasPermission('permissions.index');
        return view('permissions.edit', $data);
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(PermissionRequest $request,$id)
  {
        $permission = Permission::findOrFail($id);
          $input = $request->all();
          $inputn['name'] = ucfirst($request->get('name'));
          $inputn[$this->permissions] = Permission::getper($input);
          $permission->fill($inputn);
          $permission->save();
          Session::flash($this->success, Lang::get('ruban.permission.updated'));
          return Redirect::route('ruban.permissions.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $permission = Permission::findOrFail($id);
        $permission->delete();
        Session::flash($this->success, Lang::get('ruban.permission.deleted'));
        return Redirect::route('ruban.permissions.index');
    
  }
  
}

