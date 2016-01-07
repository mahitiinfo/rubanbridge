<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Session;
use Carbon;
use Auth;
use App\Models\Card;
class DashboardController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
   $data['colors']=array('red','yellow','aqua','blue','light-blue','green','navy','teal','olive','lime','orange','fuchsia','purple','maroon','black','red-active','yellow-active','aqua-active','blue-active','light-blue-active','green-active','navy-active','teal-active','olive-active','lime-active','orange-active','fuchsia-active','purple-active','maroon-active','black-active');
   $data['statics']=Project::get_statics();
  
   
   
   if(Auth::user()->group_id==3)
   {
   $data['acards']=Card::get_cards(Auth::getUser()->id);
    return view('partnerdashboard', $data);
   }
   else
   {
   $data['oprojects']=Project::get_projects(1);
   $data['cprojects']=Project::get_projects(2);
    return view('home', $data);
   }
  
   
    
  }

  
}

