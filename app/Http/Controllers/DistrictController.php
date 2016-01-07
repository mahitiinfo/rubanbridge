<?php namespace App\Http\Controllers;
use DB;
use Lang;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Models\District;
use App\Models\Sector;
use App\Models\VillageSector;
use App\Models\Village;
use App\Models\State;
use App\Models\Taluk;
use App\Models\Permission;
use Session;
use Carbon;
use Maatwebsite\Excel\Files\ExcelFile; 
use Excel;
use Input;
class DistrictController extends Controller {
protected $state_id='state_id';
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
  $data['districts'] = District::all();
  $data['importbtn']=Permission::hasPermission('districts.import');
  $data['deletebtn']=Permission::hasPermission('districts.delete');
  return view('districts.index',$data);
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $data['district']=District::orderby('state','asc')->lists('state','id');
    $data['listbtn']=Permission::hasPermission('districts.index');
    return view('districts.form',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(DistrictRequest $request)
  {
        $input = $request->except('image');
        $input['start_date']=Carbon\Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $input['end_date']=Carbon\Carbon::parse($request->get('end_date'))->format('Y-m-d');
        District::create($input);
        Session::flash('success', Lang::get('ruban.district.created'));
        return Redirect::route('ruban.district.index');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
 public function show($id)
  {
  $district=District::find($id);
    if($district){
    return view('districts.view', ['district' =>$district ]);
    }
    else
    {
    Session::flash('danger', Lang::get('ruban.district.notfound'));
    return Redirect::route('ruban.districts.index');
    }
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response*/
   
  public function edit($id)
  {
    $data['district']=$district=District::find($id);
    if($district){
    $data['projects']=Project::orderby('name','asc')->lists('name','id');
    $data['cancelbtn']=Permission::hasPermission('districts.index');
    return view('districts.edit',$data);
    }
    else
    {
    Session::flash('danger', Lang::get('ruban.district.notfound'));
    return Redirect::route('ruban.districts.index');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response*/
   
  public function update(CardRequest $request,$id)
  {
        $district = District::find($id);
        if($district){
        $input = $request->except('image');
        $input['start_date']=Carbon\Carbon::parse($request->get('start_date'))->format('Y-m-d');
        $input['end_date']=Carbon\Carbon::parse($request->get('end_date'))->format('Y-m-d');
        $district->fill($input);
        $district->save();
        Session::flash('success', Lang::get('ruban.district.updated'));
        return Redirect::route('ruban.districts.index');
        }
        else
        {
        Session::flash('danger', Lang::get('ruban.district.notfound'));
        return Redirect::route('ruban.districts.index');
        }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response*/
  public function destroy($id)
  {
    $district = District::find($id);
    if($district){
        $district->delete();
        Session::flash('success', Lang::get('ruban.district.deleted'));
        return Redirect::route('ruban.districts.index');
    }
    else
    {
        Session::flash('danger', Lang::get('ruban.district.notfound'));
        return Redirect::route('ruban.districts.index');
    }
  }
  /**
   *show the imort form
   *
   * @param  int  $id
   * @return Response*/
   public function import()
   {
    return view('districts.import');
   }
   /**
   * import the xls sheet values to the db.
   *
   * @param  int  $id
   * @return Response*/
   public function storeimport(DistrictRequest $request)
   
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
                
                static::import_xls($pathname,$this->state_id);
                }
        return Redirect::route('ruban.districts.import');
   }
   /**
   * static function to read the xls and store
   *
   * @param  int  $id
   * @return Response*/
   public static function import_xls($pathname,$state_id)
   {
   Excel::load($pathname, function($reader) {
                // Getting all results
                $results = $reader->get();
                foreach ($results as $result)
                {
                
                
                //checking existing Ditrict in db
                  if($result->district<>'') {
                  $state=State::where('state',$result->state)->first();
                  $statesave['state']=$result->state;
                  
                   if($state)
                  {
                    $state->fill($statesave);
                    $state->save();
                    $stateid=$state->id;
                  }
                  else
                  {
                  $state=State::create($statesave);
                  $stateid=$state->id;
                  }
                  //
                  $save['district']=$result->district;
                  $save[$state_id]=$stateid;
                  $district=District::where($state_id,$stateid)->where('district',$result->district)->first();
                  
                  if($district)
                  {
                    $district->fill($save);
                    $district->save();
                    $districtid=$district->id;
                  }
                  else
                  {
                  $district=District::create($save);
                  $districtid=$district->id;
                  }
                   $taluk=Taluk::where('district_id',$districtid)->where('taluk',$result->taluk)->first();
                 // 
                  $savet['taluk']=$result->taluk;
                  $savet['district_id']=$districtid;
                   $savevillage['district_id']=$districtid;
                  
                  if($taluk)
                  {
                    $taluk->fill($savet);
                    $taluk->save();
                    $lastid=$taluk->id;
                  }
                  else
                  {
                  $taluk=Taluk::create($savet);
                  $lastid=$taluk->id;
                  }
                  
                  $village=Village::where('district_id',$districtid)->where('taluk_id',$lastid)->where('village',$result->village)->first();
                  
                  $savevillage['taluk_id']=$lastid;
                  $savevillage['village']=$result->village;
                  $savevillage['stcode']=$result->stcode;
                  $savevillage['dtcode']=$result->dtcode;
                  $savevillage['sector_id']=$result->sector_id;
                  $savevillage['sdtcode']=$result->sdtcode;
                  $savevillage['tvcode']=$result->tvcode;
                  $savevillage['population']=$result->population;
                  $savevillage['malepopulation']=$result->malepopulation;
                  $savevillage['femalepopulation']=$result->femalepopulation;
                  $latlong=static::geotag($result);
                  if(!empty(@$latlong->results[0]->geometry->location->lat))
                  {
                      $lat=$latlong->results[0]->geometry->location->lat;
                      $lng=$latlong->results[0]->geometry->location->lng;
                      $savevillage['geoPoint']=DB::raw("GeomFromText('POINT($lat $lng)' )");
                  }
                  
                  if($village)
                  {
                  
                    $village->fill($savevillage);
                    $village->save();
                  }
                  else
                  {
                  $village=Village::create($savevillage);
                  }
                  static::map_sector($result,$village);
                  
                  }
                  unset($savevillage);
                  unset($latlong);
                }

                });
   }
   /**
   *map the sector to the village
   *
   * @param  int  $id
   * @return Response*/
   public static function map_sector($result,$village)
   {
        if(!empty($result->sector_id)) {
        $sectors=explode(",",$result->sector_id);
            if(!empty($sectors))
            {
                foreach($sectors as $sector)
                {
                    $sectorid=Sector::where('name',$sector)->first();
                    $savesec['village_id']=$village->id;
                    $savesec['sector_id']=$sectorid->id;
                    VillageSector::create($savesec);
                }
            }
        }
                  
   }
   
    public function getdistrict()
    {
    
        $equipmenttypes=District::where($this->state_id,Input::get('id'))->orderby('district','asc')->lists('district', 'id');
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
     public function gettaluk()
    {
    
        $equipmenttypes=Taluk::where('district_id',Input::get('id'))->orderby('taluk','asc')->lists('taluk', 'id');
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
   
   public static function geotag($result)
   {
        $address = $result->village.'+'.$result->taluk.'+'.$result->district.'+'.$result->state;
        $url = "http://maps.google.com/maps/api/geocode/json?address=".str_replace(" ","+",$address)."&sensor=false&region=India";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);
   }
   
   
  
}

