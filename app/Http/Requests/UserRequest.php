<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        switch ($this->method()) {
            case 'POST':
                {
                    return [
                        'email' => 'required|email|unique:users,email',
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'password' => 'required'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'email' => 'required|email|unique:users,email,' . Request::segment(2) . ',id',
                        'first_name' => 'required',
                        'last_name' => 'required'
                    ];
                }
                break;
            default:break;
        }
    }
}
