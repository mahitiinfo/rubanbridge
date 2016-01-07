<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Http\Requests\CardPartnerRequest;
use App\Models\Project;
use App\Models\Card;
use App\Models\Sector;
use App\Models\District;
use App\Models\User;
use App\Models\PartnerCards;
use App\Models\Village;
use App\Models\Permission;
use App\Models\Camp;
use App\Models\Task;

use Session;
use Carbon;
use Input;
use Auth;
use App\Models\Timeline;
class CardController extends Controller {
protected $district='district';
protected $image='image';
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
  
    $id=(Auth::user()->group_id==3)?Auth::user()->group_id:0;
    $data['cards']=Card::get_cards($id);
    $data['assignedcards']=Card::get_cards($id,1);
    $data['createbtn']=Permission::hasPermission('cards.create');
    $data['editbtn']=Permission::hasPermission('cards.edit');
    $data['deletebtn']=Permission::hasPermission('cards.delete');
    return view('cards.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
  
  $data['sectors']=Sector::lists('name','id');
  $data['districts']=District::groupby($this->district)->lists($this->district,'id');
  $data['projects']=Project::orderby('name','asc')->lists('name','id');
  $data['listbtn']=Permission::hasPermission('cards.index');
    return view('cards.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CardRequest $request)
  {
        $input = $request->except($this->image);
        $input['start_date']=Carbon\Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $input['end_date']=Carbon\Carbon::parse($request->get('end_date'))->format('Y-m-d');
        $input[$this->image]=Card::upload_cardfile($request,$this->image);
        $project=Project::find($request->get('project_id'));
        $input['state_id']=$project->state_id;
        $input['district_id']=$project->district_id;
        $input['taluk_id']=$project->taluk_id;
        $input['added_by']=Auth::user()->id;
        $card=Card::create($input);
        $timeline['object_type']=2;
        $timeline['object_id']=$card->id;
        $timeline['action']='create';
        $timeline['description']='<a href="javascript:;">'.$input['name'].'</a> card has been created by '.Auth::user()->first_name.' '.Auth::user()->last_name.'.';
        Timeline::create($timeline);
        Session::flash('success', Lang::get('ruban.card.created'));
        return Redirect::route('ruban.cards.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
  $data['colors']=array('red','yellow','aqua','blue','light-blue','green','navy','teal','olive','lime','orange','fuchsia','purple','maroon','black','red-active','yellow-active','aqua-active','blue-active','light-blue-active','green-active','navy-active','teal-active','olive-active','lime-active','orange-active','fuchsia-active','purple-active','maroon-active','black-active');
  $data['card']= $card=Card::get_card_result($id);
    if($card){
   $data['project']=Project::find($card->project_id);
   $data['goals']=Project::get_goals($card->project_id);
   $data['campgoals']=Card::get_campgoals($id);
   $data['plannedcampgoals']=Card::get_panned_campgoals($id);
    $data['partner']=Card::get_partner($id,$card->sector_id);
    $data['partners']=Card::get_partners($id,$card->sector_id);
    
    $data['camps']=Camp::where('card_id',$id)->get()->toArray();
    $data['selectedpartner']=PartnerCards::where('card_id',$id)->first();
    $data['cardtimelines']=Timeline::getFinalCardTimeline($id,2);
    $data['campcreatebtn']=Permission::hasPermission('camps.create');
    $data['campeditbtn']=Permission::hasPermission('camps.edit');
    $data['campdeletebtn']=Permission::hasPermission('camps.delete');
    $data['campimportbtn']=Permission::hasPermission('camps.import');
    $data['taskimportbtn']=Permission::hasPermission('tasks.import');
    $data['taskeditbtn']=Permission::hasPermission('tasks.edit');
    $data['taskcreatebtn']=Permission::hasPermission('tasks.create');
    $data['taskdeletebtn']=Permission::hasPermission('tasks.delete');
    $data['tasklistbtn']=Permission::hasPermission('tasks.index');
     $data['campviewbtn']=Permission::hasPermission('camps.show');
      
   $data['tasks']=Task::all();
    return view('cards.view',$data);
    }
    else
    {
    Session::flash('danger', Lang::get('ruban.card.notfound'));
    return Redirect::route('ruban.cards.index');
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
    $data['card']=$card=Card::find($id);
    if($card){
    $data['sectors']=Sector::lists('name','id');
    $data['districts']=District::groupby($this->district)->lists($this->district,'id');
    $data['projects']=Project::orderby('name','asc')->lists('name','id');
    $data['listbtn']=Permission::hasPermission('cards.update');
    return view('cards.edit',$data);
    }
    else
    {
    Session::flash('danger', Lang::get('ruban.card.notfound'));
    return Redirect::route('ruban.cards.index');
    }
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(CardRequest $request,$id)
  {
        $card = Card::find($id);
        if($card){
        $input = $request->except($this->image);
        $input['start_date']=Carbon\Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $input['end_date']=Carbon\Carbon::parse($request->get('end_date'))->format('Y-m-d');
        $input[$this->image]=Card::upload_cardfile($request,$this->image,$card->image);
        $input['updated_by']=Auth::user()->id;
        $project=Project::find($request->get('project_id'));
        $input['state_id']=$project->state_id;
        $input['district_id']=$project->district_id;
        $input['taluk_id']=$project->taluk_id;
        $card->fill($input);
        $card->save(); 
        Session::flash('success', Lang::get('ruban.card.updated'));
        $timeline['object_type']=2;
        $timeline['object_id']=$id;
        $timeline['action']='update';
        $timeline['description']='<a href="javascript:;">'.$input['name'].'</a> card has been updated by '.Auth::user()->first_name.' '.Auth::user()->last_name.'.';
        Timeline::create($timeline);

        return Redirect::route('ruban.cards.index');
        }
        else
        {
        Session::flash('danger', Lang::get('ruban.card.notfound'));
        return Redirect::route('ruban.cards.index');
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
    $card = Card::find($id);
    
    if($card){
        $card->delete();
        Session::flash('success', Lang::get('ruban.card.deleted'));
        return Redirect::route('ruban.cards.index');
    }
    else
    {
        Session::flash('danger', Lang::get('ruban.card.notfound'));
        return Redirect::route('ruban.cards.index');
    }
    
  }
  
  public function ajaxDistrict()
 {
  $data = $new = array();
  $data=false;
  $new=array();
  if(!empty(Input::get('values')) && !empty(Input::get('sector')) )
  {
  
  $data=Village::get_locations(Input::get('sector'),Input::get('state'),Input::get('values'),Input::get('taluk'));
  if($data) {
  $i = 0;
  foreach ($data as $value) {
  $location=explode(" " ,str_replace(')','',str_replace('POINT(','',$value->location)));
    $new[$i]['location'] = $value->location;
    $new[$i]['name'] = $value->village;
    $new[$i]['taluk'] = $value->taluk;
    $new[$i][$this->district] = $value->district;
    $new[$i]['population'] = $value->population;
    $new[$i]['malepopulation'] = $value->malepopulation;
    $new[$i]['femalepopulation'] = $value->femalepopulation;
    $new[$i]['latitude'] = $location[0];
    $new[$i]['longtitude'] = $location[1];
    $i++;
  }
  }
  }
  print_r(json_encode($new));
 }
 
 public function updatepartner(CardPartnerRequest $request,$id)
 {
  $input = $request->all();
  $card=Card::FindORFail($id);
  $project=Project::FindORFail($card->project_id);
  $input['card_id']=$id;
  PartnerCards::where('card_id',$id)->where('partner_id',$request->get('partner_id'))->delete();
  PartnerCards::create($input);
  $user=User::find($input['partner_id']);
  $client=User::find(2);
    $data['email']=$user->email;
    $data['name']=$user->first_name.' '.$user->last_name;
    $data['content']=$card->name.' of the '.$project->name.' project has been assigned to you.';
    Card::Mailing($data);
    
    $data1['email']=$client->email;
    $data1['name']=$client->first_name.' '.$client->last_name;
    $data1['content']=$card->name.' of the '.$project->name.' project has been assigned to '.$data['name'].' Partner.';
    Card::Mailing($data1);
      
    $timeline['object_type']=3;
    $timeline['object_id']=$id;
    $timeline['action']='assign';
    $timeline['description']='<a href="javascript:;">'.$card->name.'</a> card has been assigned to '.$user->first_name.' '.$user->last_name.' by '.Auth::user()->first_name.' '.Auth::user()->last_name.'.';
    Timeline::create($timeline);
                          
                        
  Session::flash('success', Lang::get('ruban.partner.assigned'));
        return Redirect::route('ruban.cards.index');
}

}

