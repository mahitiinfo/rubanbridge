<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampRequest;
use App\Http\Requests\CardPartnerRequest;
use App\Models\Card;
use App\Models\Camp;
use App\Models\Order;
use Session;
use Carbon;
use Input;
use Auth;
use Response;
use App\Models\Timeline;
use Maatwebsite\Excel\Files\ExcelFile; 
use Excel;
use App\Http\Requests\DistrictRequest;
use App\Models\CampHistory;
class CampController extends Controller {
protected $card_id='card_id';
protected $document='document';
protected $success='success';
protected $camp_id='camp_id';
protected $object_id='object_id';
protected $description='description';
protected $action='action';
protected $status='status';
protected $object_type='object_type';

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
  
    return Redirect::back();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($id)
  {
  Card::findOrFail($id);
   $data[$this->card_id]=$id;
    return view('camps.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CampRequest $request,$id)
  {
        Card::findOrFail($id);
        $input = $request->except('image');
        $input['start_date']=Carbon\Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $input['end_date']=Carbon\Carbon::parse($request->get('end_date'))->format('Y-m-d');
          $input['geoPoint'] =DB::raw("GeomFromText('POINT($request->latitude $request->longitude)' )"); 
          $input[$this->card_id]=$id;
        $camp= Camp::create($input);
         $timeline['object_type']=4;
        $timeline[$this->object_id]=$camp->id;
        $timeline[$this->action]='create';
        $timeline[$this->description]='<a href="javascript:;">'.$input['name'].'</a> camp has been created by '.Auth::user()->first_name.' '.Auth::user()->last_name.'.';
        Timeline::create($timeline);
        Session::flash($this->success, Lang::get('ruban.camp.created'));
        return Redirect::route('ruban.cards.show',array($id));
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($card_id,$camp_id)
  {
  
   $data['card']= Card::findOrFail($card_id);
   $data['camp']= Camp::where($this->card_id,$card_id)->findOrFail($camp_id);
   $data['dailycamps']= CampHistory::where($this->camp_id,$camp_id)->orderby('created_at','desc')->get()->toArray();
   
    return view('camps.history',$data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($card_id,$id)
  {
    Card::findOrFail($card_id);
    $data[$this->card_id]=$card_id;
    $data['camp']=Camp::select(DB::raw('X(geoPoint) as latitude, Y(geoPoint) as longitude,name,card_id,start_date,end_date,no_of_people,target,address,id,document,status,budget,comments,actual_budget,actual_orders,actual_deliver_time,village_details'),'order')->findOrFail($id);
    return view('camps.edit',$data);
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(CampRequest $request,$card_id,$id)
  {
         $timeline[$this->action]='update';
        $options['0']='Planned';
        $options['1']='Completed';
        $options['2']='Incompleted';
        $options['3']='In Progress';
         Card::findOrFail($card_id);
        $camp = Camp::findOrFail($id);
        $input = $request->except('image');
        $input['start_date']=Carbon\Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $input['end_date']=Carbon\Carbon::parse($request->get('end_date'))->format('Y-m-d');
        $input['geoPoint'] =DB::raw("GeomFromText('POINT($request->latitude $request->longitude)' )"); 
        $input[$this->card_id]=$card_id;
        
         if($camp->status<>$input[$this->status])
        {
        $timeline[$this->description]='<a href="javascript:;">'.Auth::user()->first_name.' '.Auth::user()->last_name.'</a> changed the '.$camp->name.' camp status to '.$options[$input[$this->status]].'.';
        }
        else
        {
        $timeline[$this->description]='<a href="javascript:;">'.$camp->name.'</a> camp has been updated by '.Auth::user()->first_name.' '.Auth::user()->last_name.'.';
        }
        
        $camp->fill($input);
        $camp->save();
        Session::flash($this->success, Lang::get('ruban.camp.updated'));
        $timeline['object_type']=4;
        $timeline[$this->object_id]=$id;
        
        Timeline::create($timeline);
        return Redirect::route('ruban.cards.show',array($card_id));
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
        Session::flash($this->success, Lang::get('ruban.camp.deleted'));
        return Redirect::route('ruban.camps.index');
    
  }
  /* GEt the file id and the table name based on that will do the downlaod
    
    * params int $id
    * return reponse of select options
    */
    
    public function doDownload($id,$field)
    {
        $result=Camp::findOrFail($id);
        $extracted=json_decode($result->$field);
            $headers = array(
              'Content-Type: '.$extracted->fileType,
            );
        return Response::download(base_path().$extracted->filePath, $extracted->fileOriginalName, $headers);
    }
    
    /* Get the equipment type by specified equipemt category
    
    * params int $id
    * return reponse of select options
    */
    public function getcamp()
    {
        $equipmenttypes=Camp::where($this->card_id,Input::get('id'))->orderby('name','asc')->lists('name', 'id');
        $out='<option value="">Select Option</option>';
        if($equipmenttypes)
        {
            foreach($equipmenttypes as $key=>$equipmenttype)
            {
            $out .='<option value="'.$key.'">'.$equipmenttype.'</option>';
            }
        }
        echo $out;
    }
    /**
   *show the imort form
   *
   * @param  int  $id
   * @return Response*/
   public function import($camp_id)
   {
   $data[$this->camp_id]=$camp_id;
    return view('camps.import',$data);
   }
   /**
   * import the xls sheet values to the db.
   *
   * @param  int  $id
   * @return Response*/
   public function storeimport(DistrictRequest $request,$camp_id)
   
   {
    $file='fileimport';
          if ($request->hasFile($file)) {
                $destinationPath = base_path()."/uploads/import/";
                $filename = $request->file($file)->getClientOriginalName();
                $request->file($file)->getRealPath();
                $request->file($file)->getClientOriginalExtension();
                $request->file($file)->move($destinationPath,$destinationPath.$filename,0777);
                chmod($destinationPath.$filename,0777);
                $pathname=$destinationPath.$filename;
                
                static::import_xls($pathname,$camp_id,$this->camp_id,$this->description,$this->object_id,$this->object_type,$this->action);
                }
        return Redirect::route('ruban.camps.import',array($camp_id));
   }
   /**
   * static function to read the xls and store
   *
   * @param  int  $id
   * @return Response*/
   public static function import_xls($pathname,$camp_id,$campid,$description,$object_id,$object_type,$action)
   {
                
                $camp=Camp::findOrFail($camp_id);
                Excel::load($pathname, function($reader) use ($camp) {
                $results = $reader->get();
                foreach ($results as $result)
                {
                    $save['no_of_villages_covered']=$camp->no_of_villages_covered + $result->no_of_villages_covered;
                    $save['order_value']=$camp->order_value + $result->sales_value;
                    $save['no_of_people']=$camp->no_of_people + $result->total_registration;
                    $save['actual_orders']=$camp->actual_orders + $result->total_sales;
                    $save['actual_budget']=$camp->actual_budget + $result->today_expenses;
                    $save['actual_deliver_time']=$camp->actual_deliver_time + $result->average_time_to_deliver;
                    $save['village_details']=$camp->village_details.','.$result->village.','.$result->gp;
                    $date = Carbon\Carbon::parse($result->date)->toFormattedDateString();
                    $save['updated_date']=date('Y-m-d H:i:s',strtotime($date));
                    
                    $saveh['campid']=$camp->id;
                    $saveh['no_of_villages_covered']=$result->no_of_villages_covered;
                    $saveh['order_value']=$result->sales_value;
                    $saveh['no_of_people']=$result->total_registration;
                    $saveh['actual_orders']=$result->total_sales;
                    $saveh['actual_budget']=$result->today_expenses;
                    $saveh['actual_deliver_time']=$result->average_time_to_deliver;
                    $saveh['village_details']=$result->village.','.$result->gp;
                    $date = Carbon\Carbon::parse($result->date)->toFormattedDateString();
                    $saveh['updated_date']=date('Y-m-d H:i:s',strtotime($date));
                    
                    
                    $camp->fill($save);
                    $camp->save();
                    
                    CampHistory::create($saveh);
                    
                    $timeline['description']=Auth::user()->first_name.' '.Auth::user()->last_name.' has imported the daily camp xls for <a href="javascript:;">'.$camp->name.'</a>';
        $timeline['object_type']=4;
        $timeline['action']='import';
        $timeline['object_id']=$camp->id;
        Timeline::create($timeline);
                    Session::flash('success', Lang::get('ruban.camp.updated'));
                }

                });
   }
   
   /**
   *show the imort form
   *
   * @param  int  $id
   * @return Response*/
   public function orderimport($camp_id)
   {
   $data[$this->camp_id]=$camp_id;
   $data['card']=Camp::findOrFail($camp_id);
    return view('camps.orderimport',$data);
   }
   /**
   * import the xls sheet values to the db.
   *
   * @param  int  $id
   * @return Response*/
   public function storeorderimport(DistrictRequest $request,$camp_id)
   
   {
   $camp=Camp::findOrFail($camp_id);
    $file='fileimport';
          if ($request->hasFile($file)) {
                $destinationPath = base_path()."/uploads/import/";
                $filename = $request->file($file)->getClientOriginalName();
                $request->file($file)->getRealPath();
                $request->file($file)->getClientOriginalExtension();
                $request->file($file)->move($destinationPath,$destinationPath.$filename,0777);
                chmod($destinationPath.$filename,0777);
                $pathname=$destinationPath.$filename;
                
                static::orderimport_xls($pathname,$camp_id,$this->camp_id,$this->description,$this->object_id,$this->object_type,$this->status);
                }
        return Redirect::route('ruban.cards.view',array($camp->card_id));
   }
   /**
   * static function to read the xls and store
   *
   * @param  int  $id
   * @return Response*/
   public static function orderimport_xls($pathname,$camp_id,$campid,$description,$object_id)
   {
                
                $camp=Camp::findOrFail($camp_id);
                Excel::load($pathname, function($reader) use ($camp) {
                $results = $reader->get();
                foreach ($results as $result)
                {
                    $save['order_id']=$result->order_id;
                   $save['warehouse']=$result->warehouse;
                   $save['ship_date']=date('Y-m-d H:i:s',strtotime($result->ship_date));
                   $save[$status]=$result->status;
                   $save['order_amount']=$result->order_amount;
                   $save['actual_time_to_deliver']=$result->actual_time_to_deliver;
                   $save['payment_method']=$result->payment_method;
                   $save['associate']=$result->associate;
                   $save['address_type']=$result->address_type;
                   $save['address']=$result->customer_name.','.$result->status.','.$result->city.','.$result->district.','.$result->province.','.$result->customer_phone;
                   $save[$campid]=$camp->id;
                   Order::create($save);
                    Session::flash('success', Lang::get('ruban.camp.updated'));
                    unset($save);
                }
                
                
        $timeline[$description]=Auth::user()->first_name.' '.Auth::user()->last_name.' has imported the daily camp xls for <a href="javascript:;">'.$camp->title.'</a>';
        $timeline[$object_type]=5;
        $timeline[$object_id]=$camp->id;
        Timeline::create($timeline);
        

                });
   }
   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function order($id)
  {
  
    $data['orders']=Order::where($this->camp_id,$id)->get()->toArray();
    return view('camps.order', $data);
  }

}

