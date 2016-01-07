<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Sector;
use App\Models\District;
use App\Models\Card;
use App\Models\State;
use App\Models\Taluk;
use Session;
use Carbon;
use App\Models\Permission;
use Input;
use App\Models\Timeline;
use Auth;
class ProjectController extends Controller {

protected $image='image';
protected $success='success';
protected $danger='danger';


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
  
   $data['projects']=Project::get_projects_bylogin();
  $data['createbtn']=Permission::hasPermission('projects.create');
  $data['editbtn']=Permission::hasPermission('projects.edit');
  $data['deletebtn']=Permission::hasPermission('projects.delete');
  $data['viewbtn']=Permission::hasPermission('projects.view');
  return view('projects.index',$data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
  $data['sectors']=Sector::lists('name','id');
   $data['states']=State::lists('state','id');
  $data['districts']=array();
  $data['taluks']=array();
   $data['listbtn']=Permission::hasPermission('projects.index');
    return view('projects.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ProjectRequest $request)
  {
        $input = $request->except($this->image);
        $input['start_date']=Carbon\Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $input['end_date']=Carbon\Carbon::parse($request->get('end_date'))->format('Y-m-d');
        $input[$this->image]=Project::upload_projectfile($request,$this->image);
        $input['added_by']=Auth::user()->id;
       $project= Project::create($input);
        $timeline['object_type']=1;
        $timeline['object_id']=$project->id;
        $timeline['action']='create';
        $timeline['description']='<a href="javascript:;">'.$input['name'].'</a> project has been created by '.Auth::user()->first_name.' '.Auth::user()->last_name.'.';
        Timeline::create($timeline);
        Session::flash($this->success, Lang::get('ruban.project.created'));
        return Redirect::route('ruban.projects.index');
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
  $data['project']=$project=Project::get_project($id);
   $data['colors']=array('red','yellow','aqua','blue','light-blue','green','navy','teal','olive','lime','orange','fuchsia','purple','maroon','black','red-active','yellow-active','aqua-active','blue-active','light-blue-active','green-active','navy-active','teal-active','olive-active','lime-active','orange-active','fuchsia-active','purple-active','maroon-active','black-active');
    if($project){
    $data['goals']=Project::get_goals($id);
    $data['campgoals']=Project::get_camp_goals($id);
    $data['plancampgoals']=Project::get_camp_planned_goals($id);
    $data['cards']=Card::where('project_id',$id)->get();
    $data['timelines']=Timeline::getFinalTimeline($id,1);
    return view('projects.view', $data);
    }
    else
    {
    Session::flash($this->danger, Lang::get('ruban.project.notfound'));
    return Redirect::route('ruban.projects.index');
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
    $data['project']=$project=Project::find($id);
    if($project){
    $data['sectors']=Sector::lists('name','id');
    $data['states']=State::lists('state','id');
    $data['districts']=District::where('state_id',$data['project']->state_id)->lists('district','id');
    $data['taluks']=Taluk::where('district_id',$data['project']->district_id)->lists('taluk','id');
    $data['cancelbtn']=Permission::hasPermission('projects.index');
    return view('projects.edit', $data);
    }
    else
    {
    Session::flash($this->danger, Lang::get('ruban.project.notfound'));
    return Redirect::route('ruban.projects.index');
    }
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(ProjectRequest $request,$id)
  {
        $project = Project::find($id);
        if($project){
        $input = $request->except($this->image);
        $input['start_date']=Carbon\Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $input['end_date']=Carbon\Carbon::parse($request->get('end_date'))->format('Y-m-d');
        $input[$this->image]=Project::upload_projectfile($request,$this->image,$project->image);
        $input['updated_by']=Auth::user()->id;
        $project->fill($input);
        $project->save();
        Session::flash($this->success, Lang::get('ruban.project.updated')); 
        $timeline['object_type']=1;
        $timeline['object_id']=$id;
        $timeline['action']='update';
        $timeline['description']='<a href="javascript:;">'.$input['name'].'</a> project has been updated by '.Auth::user()->first_name.' '.Auth::user()->last_name.'.';
        Timeline::create($timeline);
        return Redirect::route('ruban.projects.index');
        }
        else
        {
        Session::flash($this->danger, Lang::get('ruban.project.notfound'));
        return Redirect::route('ruban.projects.index');
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
    $project = Project::find($id);
    if($project){
        $project->delete();
        Session::flash($this->success, Lang::get('ruban.project.deleted'));
        return Redirect::route('ruban.projects.index');
    }
    else
    {
        Session::flash($this->danger, Lang::get('ruban.project.notfound'));
        return Redirect::route('ruban.projects.index');
    }
    
  }
  public function ajaxDistrict()
 {
 $project=Project::get_project(Input::get('projectid'))->toArray();
 print_r(json_encode($project));
 }
  
}

