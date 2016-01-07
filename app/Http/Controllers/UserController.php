<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PartnerRequest;
use App\Models\User;
use App\Models\Group;
use App\Models\Permission;
use App\Models\Sector;
use App\Models\District;
use App\Models\PartnerDistrict;
use Session;
use Carbon;
class UserController extends Controller {
protected $success='success';
protected $partner_id='partner_id';
protected $pwd='password';


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
  $data['users'] = User::with('group')->get();
  $data['createbtn']=Permission::hasPermission('users.create');
  $data['editbtn']=Permission::hasPermission('users.edit');
   $data['deletebtn']=Permission::hasPermission('users.delete');
  return view('users.index',$data);
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $data['groups']=Group::orderby('name','asc')->lists('name','id');
    $data['sectors']=Sector::lists('name','id');
    $data['districts']=District::lists('district','id');
    $data['listbtn']=Permission::hasPermission('users.index');
    return view('users.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(UserRequest $request)
  {
         $input = $request->except($this->password);
        if($request->get($this->pwd)<>'')
        {
        $input[$this->pwd] = bcrypt($request->get($this->password));
        }
       $user= User::create($input);
       PartnerDistrict::where($this->partner_id,$user->id)->delete();
       if($request->get('group_id')==3)
       {
        static::updatesector($request,$user->id);
        }
        Session::flash($this->success, Lang::get('ruban.user.created'));
        return Redirect::route('ruban.users.index');
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
  $user=User::findOrfail($id);
  
    return view('users.view', ['user' =>$user ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $data['user']=User::findOrFail($id);
    $data['groups']=Group::orderby('name','asc')->lists('name','id');
    $data['sectors']=Sector::lists('name','id');
    $data['districts']=District::lists('district','id');
    $selected=PartnerDistrict::where($this->partner_id,$id)->get();
    $data['districtsselected']=PartnerDistrict::get_districts($selected);
    $data['sectorsselected']=PartnerDistrict::get_sectors($selected);
    $data['cancelbtn']=Permission::hasPermission('users.index');
    return view('users.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(UserRequest $request,$id)
  {
        $user = User::findOrFail($id);
        $input = $request->except($this->pwd,'permissions');
        if($request->get($this->pwd)<>'')
        {
        $input[$this->pwd] = bcrypt($request->get($this->pwd));
        }
        $user->fill($input);
        PartnerDistrict::where($this->partner_id,$id)->delete();
        if($request->get('group_id')==3)
       {
        static::updatesector($request,$id);
        }
        
        $user->save();
        Session::flash($this->success, Lang::get('ruban.user.updated'));
        return Redirect::route('ruban.users.index');
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $user = User::findOrfail($id);
        $user->delete();
        Session::flash($this->success, Lang::get('ruban.user.deleted'));
        return Redirect::route('ruban.users.index');
    
  }
   /**
   * Update the profile
   *
   * @param  int  $id
   * @return Response
   */
  public function updateprofile($id)
  {
  $data['user']=User::findOrFail($id);
    $data['sectors']=Sector::lists('name','id');
    $data['districts']=District::lists('district','id');
    $districtsselected=PartnerDistrict::get_districts_selected($id);
    $data['districtsselected']=PartnerDistrict::format_selected($districtsselected);
    $data['cancelbtn']=Permission::hasPermission('users.index');
   
    return view('users.profile', $data);
  }
  public function profileudpate(ProfileRequest $request,$id)
  {
    $user = User::findOrFail($id);
    $input = $request->all();
    $input['image']=User::upload_userfile($request,'image',$user->image);
    $user->fill($input);
    $user->save();        
    return Redirect::route('ruban.users.profile',array($id));
  }
  /**
   * Update the sector and district for the partner
   *
   * @param  int  $id
   * @return Response
   */
  public static function updatesector($request,$id)
  {
        $districts=$request->get('district_id');
        $sectors=$request->get('sector_id');
        foreach($districts as $district)
        {
            foreach($sectors as $sector)
            {
                $save['partner_id']=$id;
                $save['district_id']=$district;
                $save['sector_id']=$sector;
                PartnerDistrict::create($save);
                unset($save);
            }
        }
  }
  
}

