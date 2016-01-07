<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\DisputeRequest;
use App\Models\Project;
use Session;
use Carbon;
use App\Models\Permission;
use Input;
use App\Models\Timeline;
use App\Models\Dispute;
use Auth;
class DisputeController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
   $data['createbtn']=Permission::hasPermission('disputes.create');
    $data['editbtn']=Permission::hasPermission('disputes.edit');
    $data['viewbtn']=Permission::hasPermission('disputes.show');
    $data['status']=array('0'=>'Pending','1'=>'Closed');
  $data['disputes']=Dispute::get_disputes();
  return view('disputes.index',$data);
    
  }
  
  public function project_index($id)
  {
   $data['createbtn']=false;
    $data['editbtn']=Permission::hasPermission('disputes.edit');
    $data['viewbtn']=Permission::hasPermission('disputes.show');
    $data['status']=array('0'=>'Pending','1'=>'Closed');
  $data['disputes']=Dispute::get_disputes($id);
  return view('disputes.index',$data);
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
  $data['projects']= Dispute::getlists(Project::get_payouts(2,1));
  $data['listbtn']=Permission::hasPermission('disputes.index');
    return view('disputes.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(DisputeRequest $request)
  {
        $input = $request->all();
        $input['added_by']=Auth::user()->id;
        Dispute::create($input);
        Session::flash('success', Lang::get('ruban.dispute.created'));
        return Redirect::route('ruban.disputes.index');
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
   return Redirect::route('ruban.disputes.index');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $data['dispute']=Dispute::findOrFail($id);
    $data['projects']= Dispute::getlists(Project::get_payouts(2,0));
  $data['cancelbtn']=Permission::hasPermission('disputes.index');
    return view('disputes.edit', $data);
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(DisputeRequest $request,$id)
  {
        $project = Dispute::findOrFail($id);
         $input = $request->all();
        $input['updated_by']=Auth::user()->id;
        $project->fill($input);
        $project->save();
        Session::flash('success', Lang::get('ruban.dispute.updated')); 
        return Redirect::route('ruban.disputes.index');
    
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
        Session::flash('success', Lang::get('ruban.project.deleted'));
        return Redirect::route('ruban.projects.index');
    }
    else
    {
        Session::flash('danger', Lang::get('ruban.project.notfound'));
        return Redirect::route('ruban.projects.index');
    }
    
  }
  public function ajaxDistrict()
 {
 $project=Project::get_project(Input::get('projectid'))->toArray();
 print_r(json_encode($project));
 }
  
}

