<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\CardPartnerRequest;
use App\Http\Requests\TaskfileRequest;
use App\Models\Card;
use App\Models\Camp;
use App\Models\Task;
use Session;
use Carbon;
use Input;
use Auth;
use Response;
use App\Models\Timeline;
use App\Models\Permission;
use Maatwebsite\Excel\Files\ExcelFile; 
use Excel;

class TaskController extends Controller {
protected $card_id='card_id';
protected $document='document';
protected $success='success';



  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index($card_id=false,$camp_id=false)
  {
    $data['tasks']=Task::get_tasks($card_id,$camp_id);
    $data['createbtn']=Permission::hasPermission('tasks.create');
    $data['editbtn']=Permission::hasPermission('tasks.edit');
    $data['deletebtn']=Permission::hasPermission('tasks.delete');
    return view('tasks.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
     $id=(Auth::user()->group_id==3)?Auth::user()->group_id:0;
    $data['cards']=Card::get_cards($id,1)->lists('name','id');
    $data['camps']=array();
    
    return view('tasks.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(TaskRequest $request)
  {
        $input = $request->all();
        $input['added_by']=Auth::user()->id;
        $camp= Task::create($input);
         $timeline['object_type']=5;
        $timeline['object_id']=$camp->id;
        $timeline['action']='create';
        $timeline['description']='<a href="javascript:;">'.$input['title'].'</a> task has been created by '.Auth::user()->first_name.' '.Auth::user()->last_name.'.';
        Timeline::create($timeline);
        Session::flash($this->success, Lang::get('ruban.camp.created'));
        return Redirect::route('ruban.tasks.index');
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $data['task']=Task::findOrFail($id);
    if($data['task']->card_id<>0 && $data['task']->card_id<>'')
    {
    $data['camps']=Camp::where('card_id',$data['task']->card_id)->lists('name','id');
    }
    else
    {
    $data['camps']=Camp::lists('name','id');
    }
    
     $isd=(Auth::user()->group_id==3)?Auth::user()->group_id:0;
    $data['cards']=Card::get_cards($isd,1)->lists('name','id');
    return view('tasks.edit',$data);
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(TaskRequest $request,$id)
  {
         $timeline['action']='update';
        $camp = Task::findOrFail($id);
        $input = $request->all();
        
         if($camp->status<>$input['status'])
        {
        $timeline['description']='<a href="javascript:;">'.Auth::user()->first_name.' '.Auth::user()->last_name.'</a> changed the '.$camp->title.' task status to '.$input['status'].'.';
        }
        else
        {
        $timeline['description']='<a href="javascript:;">'.$camp->title.'</a> task has been updated by '.Auth::user()->first_name.' '.Auth::user()->last_name.'.';
        }
        $input['updated_by']=Auth::user()->id;
        $camp->fill($input);
        $camp->save();
        Session::flash($this->success, Lang::get('ruban.task.updated'));
        $timeline['object_type']=6;
        $timeline['object_id']=$id;
        
        Timeline::create($timeline);
        return Redirect::route('ruban.tasks.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
        $camp = Camp::findOrFail($id);
        $camp->delete();
        Session::flash($this->success, Lang::get('ruban.task.deleted'));
        return Redirect::route('ruban.tasks.index');
    
  }
    
    /**
   *show the imort form
   *
   * @param  int  $id
   * @return Response*/
   public function import($card_id=false,$camp_id=false)
   {
   $data['card_id']=$card_id;
   $data['camp_id']=$camp_id;
   $data['route']='import';
   if($card_id)
   {
   $data['route']='taskimport';
   }
    return view('tasks.import',$data);
   }
   /**
   * import the xls sheet values to the db.
   *
   * @param  int  $id
   * @return Response*/
   public function storeimport(TaskfileRequest $request,$card_id=false,$camp_id=false)
   
   {
    $file='file';
          if ($request->hasFile($file)) {
                $destinationPath = base_path()."/uploads/import/";
                $filename = $request->file($file)->getClientOriginalName();
                $request->file($file)->getRealPath();
                $request->file($file)->getClientOriginalExtension();
                $request->file($file)->move($destinationPath,$destinationPath.$filename,0777);
                chmod($destinationPath.$filename,0777);
                $pathname=$destinationPath.$filename;
                
                static::import_xls($pathname,$card_id,$camp_id);
                }
                Session::flash($this->success, Lang::get('ruban.task.import'));
                if($card_id)
                {
                return Redirect::route('ruban.cards.show',array($card_id));
                }
                else
                {
            return Redirect::route('ruban.tasks.import');
            }
   }
   /**
   * static function to read the xls and store
   *
   * @param  int  $id
   * @return Response*/
   public static function import_xls($pathname,$card_id=false,$camp_id=false)
   {
            Excel::load($pathname, function($reader) use($card_id,$camp_id) {
                // Getting all results
                $results = $reader->get();
               $cnt=1;
                foreach ($results as $result)
                {
                //checking existing Ditrict in db
                  if($cnt < 6) {
                  if($card_id)
                  {
                  $exitdist=Card::where('id',$card_id)->first();
                  }
                  else
                  {
                  $exitdist=Card::where('name',$result->card)->first();
                  }
                  if($camp_id)
                  {
                  $camp=Camp::where('id',$camp_id)->first();
                  }
                  else
                  {
                  $camp=Camp::where('name',$result->camp)->first();
                  }
                  
                  
                  $save['card_id']=@$exitdist->id;
                  $save['camp_id']=@$camp->id;
                  $save['title']=$result->title;
                  $save['description']=' Order Id :'.$result->order_id. ', Ship date:'.$result->ship_date;
                  $save['added_by']=Auth::user()->id;
                  $save['status']=$result->status;
                  $save['order_amount']=$result->order_amount;
                   $save['actual_time_to_deliver']=$result->actual_time_to_deliver;
                   $save['payment_method']=$result->payment_method;
                   $save['address_type']=$result->address_type;
                   $save['address']=' Customer_name:'.$result->customer_name.', Status:'.$result->status.', City:'.$result->city.', District'.$result->district.', Province'.$result->province.', Customer Phone'.$result->customer_phone;
                   
                   
                  Task::create($save);
                  if(@$camp->title)
                  {
                  $timeline['description']=Auth::user()->first_name.' '.Auth::user()->last_name.' has imported the task for <a href="javascript:;">'.$camp->title.'</a>';
        $timeline['object_type']=6;
        $timeline['object_id']=$camp->id;
        Timeline::create($timeline);
        }
        if(@$exitdist->name){
        $timeline['description']=Auth::user()->first_name.' '.Auth::user()->last_name.' has imported the task for <a href="javascript:;">'.@$exitdist->name.'</a>';
        $timeline['object_type']=6;
        $timeline['object_id']=$exitdist->id;
        Timeline::create($timeline);
        }
        
                  unset($save);
                }
                $cnt++;
                }
                
                

                });
   }
    

}

