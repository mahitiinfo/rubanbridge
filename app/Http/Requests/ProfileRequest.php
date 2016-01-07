<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileRequest extends Request
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
                       
                        'first_name' => $this->required,
                        'last_name' => $this->required ,
                        'address' => $this->required ,
                        'company_name' => $this->required,
                        'pancard' => $this->required
                    ];
    }
}
