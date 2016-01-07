<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\PayoutRequest;
use App\Models\Project;
use App\Models\Sector;
use App\Models\District;
use App\Models\Card;
use Session;
use Carbon;
use App\Models\Permission;
use Input;
use App\Models\Timeline;
use Auth;
class PayoutController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
  $data['status']=array('0'=>'Pending','1'=>'Paid');
  $data['payouts']= Project::get_payouts();
  return view('projects.payouts',$data);
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($id)
  {
  $data['project']=Project::findOrFail($id);
  $data['id']=$id;
  $data['status']=array('0'=>'Pending','1'=>'Paid');
    return view('projects.payment',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(PayoutRequest $request,$id)
  {
         $project = Project::findOrFail($id);
         $input = $request->all();
        $input = $request->all();
        $input['updated_by']=Auth::user()->id;
        $input['payment_date']=date('Y-m-d H:i:s');
        $project->fill($input);
        $project->save();
        Session::flash('success', Lang::get('ruban.payout.created'));
        return Redirect::route('ruban.payouts.index');
    
  }
  
}

