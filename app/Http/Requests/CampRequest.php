<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class CampRequest extends Request
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
         
        $post['name']= $this->required;
        $post['start_date']= $this->required;
        $post['end_date']= $this->required;
        $post['order']= $this->required;
        $post['budget']= $this->required;
        $post['address']= $this->required;
        $post['latitude']= $this->required;
        $post['longitude']=$this->required;
        $post['no_of_people']=$this->required;
        $update['actual_orders']= $this->required;
        $update['actual_budget']= $this->required;
        $update['comments']= $this->required;
         
         switch ($this->method()) {
            case 'POST':
                {
                    return $post;
                }
            case 'PUT':
            case 'PATCH':
                {
                     return $update;
                }
                break;
            default:break;
        }
       
    }
}
