<?php
/**
   * Manage the cards module
   *
   * @var string
   */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use Auth;
use DB;
use Mail;
class Card extends Model {

public static $partner_card='partner_card';
public static $cards='cards';
public static $c_id='cards.id';
public static $u_name='users.name';

public static $c_district_id='cards.district_id';

/**
   * The database table used by the model.
   *
   * @var string
   */
    protected $table = 'cards';
    /**
   * The timestamps created by the model(created at and updated_at) while insert or update the table used by the model.
   *
   * @var timestamps
   */
    public $timestamps = true;
    /**
   * Managing the soft deletes by the table.
   *
   * @var timestamps
   */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
   * Defines the fields name that can be inserted into the table
   *
   * @var string
   */
    protected $fillable = array('project_id','name','sector_id','district_id', 'camps', 'deliver_time', 'start_date', 'end_date','comments','active','total_villagers','orders','budget','status','image','state_id','taluk_id');
    /**
   * Get the card details for the specified card id
   
   * params @int $id
   *
   * return array
   */
    public static function get_card_result($id)
    {
    $project =Card::select('cards.*','sector.name as sectorname','projects.name as projectname','district.district as districtname','state.state as statename','taluk');
        $project ->join('projects','cards.project_id','=','projects.id');
        $project ->join('sector','cards.sector_id','=','sector.id');
        $project ->join('district',static::$c_district_id,'=','district.id','left');
        $project ->join('state','cards.state_id','=','state.id','left');
                $project ->join('taluk','cards.taluk_id','=','taluk.id','left');
        $project ->where(static::$c_id,$id);
        return $project ->first();
    }
    /**
   * Get the list of cards by the group
   *
   * Ex admin can access everythins but partner login can access only assigned cards
   
   * params @int $id(partner id), int assigned, int status
   *
   * return array
   */
    public static function get_cards($id=false,$assigned=false,$status=false)
    {
        $card =Card::select('cards.*','sector.name as sectorname','projects.name as projectname','district.district as districtname','sector.name as sectorname','state.state as statename');
        $card ->join('projects','cards.project_id','=','projects.id');
        $card ->join('sector','cards.sector_id','=','sector.id');
        $card ->join('district',static::$c_district_id,'=','district.id','left');
        $card ->join('state','cards.state_id','=','state.id','left');
        if($id)
        {
        $card ->join(static::$partner_card,'partner_card.card_id','=',static::$c_id);
        $card->where('partner_id',$id);
        }
        if(Auth::user()->group_id==4)
        {
            if($assigned)
            {
             $card->whereIn(static::$c_id, function($query)
            {
            $query->select('card_id')
            ->from(static::$partner_card);
            });
            }
            else
            {
            $card->whereNotIn(static::$c_id, function($query)
            {
            $query->select('card_id')
            ->from(static::$partner_card);
            });
            }
        }
        if($status)
        {
        $card->where('cards.status',$status);
        }
        if(Auth::user()->group_id==2)
        {
        $card->where('projects.added_by',Auth::user()->id);
        }
        $card->orderby(static::$c_id,'desc');
        return $card->get();
        
    }
    /**
   * Upload the file for specified the card
   
   * params @array $file,$filename, existfile
   *
   * return filename
   */
    public static function upload_cardfile($request,$cfile,$cfilename=false)
    {
        if ($request->hasFile($cfile)) {
                $cdestinationPath = base_path()."/uploads/cards/";
                $cfilename = $request->file($cfile)->getClientOriginalName();
                $request->file($cfile)->move($cdestinationPath,$cdestinationPath.$cfilename,0777);
                chmod($cdestinationPath.$cfilename,0777);
        }
        return $cfilename;
    }
    /**
   * Get the assigned vle for the specified card with sector and district
   
   * params @int $id
   *
   * return array
   */
    public static function get_partner($id,$sid)
    {
        $card =Card::select('users.id',static::$u_name);
        $card ->leftjoin('partner_district_sector', function($join) use($sid)
        {
            $join->on('partner_district_sector.district_id', '=', static::$c_district_id);
            $join->where('partner_district_sector.sector_id', '=', $sid);
        });
                
        $card ->join('users','users.id','=','partner_district_sector.partner_id','left');
         $card->where(static::$c_id,$id);
        $card->where('group_id',3);
        $card->orderby(static::$u_name,'asc');
        return $card->lists(static::$u_name,'users.id');
    }
    /**
   * Get the assigned vle for the specified card with sector and district
   
   * params @int $id
   *
   * return array
   */
     public static function get_partners($id,$sid)
    {
        $partners =Card::select('users.*');
        $partners ->leftjoin('partner_district_sector', function($join) use($sid)
        {
            $join->on('partner_district_sector.district_id', '=', static::$c_district_id);
            $join->where('partner_district_sector.sector_id', '=', $sid);
        });
                
        $partners ->join('users','users.id','=','partner_district_sector.partner_id','left');
         $partners->where(static::$c_id,$id);
        $partners->where('group_id',3);
        $partners->orderby(static::$u_name,'asc');
        return $partners->get();
    }
    /**
   * get the actual goal completion for the specified cards with camps
   
   * params @int $id
   *
   * return array
   */
    public static function get_campgoals($id)
    {
        $actual =Camp::select(DB::Raw('sum(rb_camps.actual_budget) as budget'),DB::Raw('count(rb_camps.id) as camps'),DB::Raw('sum(rb_camps.no_of_people) as total_villagers'),DB::Raw('sum(rb_camps.actual_orders) as orders'),DB::Raw('avg(rb_camps.actual_deliver_time) as deliver_time'));
        $actual ->join(static::$cards,static::$c_id,'=','camps.card_id');
        $actual->where('camps.card_id',$id);
        $actual->whereIn('camps.status',array('1','2'));
        return $actual->first();
    }
    /**
   * get the palnned goal completion for the specified cards with camps
   
   * params @int $id
   *
   * return array
   */
    public static function get_panned_campgoals($id)
    {
        $pannedcamp =Camp::select(DB::Raw('sum(rb_camps.budget) as budget'),DB::Raw('count(rb_camps.id) as camps'),DB::Raw('sum(rb_camps.no_of_people) as total_villagers'),DB::Raw('sum(rb_camps.order) as orders'),DB::Raw('avg(rb_camps.deliver_time) as deliver_time'));
        $pannedcamp ->join(static::$cards,static::$c_id,'=','camps.card_id');
        $pannedcamp->where('camps.card_id',$id);
        return $pannedcamp->first();
    }
    /**
   * get the palnned goal completion for the specified cards with camps
   
   * params @int $id
   *
   * return array
   */
    public static function Mailing($data)
    {
        $from = "venkatesan.c@mahiti.org";
        $subject = "Ruban Bridge- Notification";
        $to=$data['email'];
        Mail::send('emails.notification', $data, function($message) use(&$from, &$to, &$subject)
        {
        $message->from($from, 'Venkatesan');

        $message->to($to)->subject($subject)->bcc(array('venkatesangee@gmail.com','arun.kumar@mahiti.org'));

        });
    }
}
