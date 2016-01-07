<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class DisputeRequest extends Request
{
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
         
        $post['status']= 'required';
        $post['reason']= 'required';
        $post['project_id']= 'required';
         
         switch ($this->method()) {
            case 'POST':
                {
                    return $post;
                }
            case 'PUT':
            case 'PATCH':
                {
                     return $post;
                }
                break;
            default:break;
        }
       
    }
}
