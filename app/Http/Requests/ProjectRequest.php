<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest extends Request
{
protected $required='required';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => $this->required,
            'district_id' => $this->required,
            'sector_id' => $this->required,
            'camps' => $this->required,
            'start_date' => $this->required,
            'end_date' => $this->required,
            'comments' => $this->required,
            'deliver_time' => $this->required,
            'total_villagers'=>$this->required,
            'budget'=>$this->required,
            'orders'=>$this->required,
            'active'=>$this->required,
            'status'=>$this->required,
            'image'=>'required_if:update,false|mimes:png,jpg,JPG,jpeg,JPEG,gif'
        ];
    }
}
