<?php

namespace App\Http\Requests;

use Auth;
use Session;
use App\User;
use App\Http\Requests\Request;

class AdminLoginRequest extends Request
{
    /**
     * Determine if the user is admin
     *
     * @return bool
     */
    public function authorize()
    {
        $data = array('email'       => $this->input('email'),
                      'password'    => $this->input('password'),
                      );

        if (Auth::attempt($data, true))
            return true;

        abort(401);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required',
            'password'  => 'required'
        ];
    }
}
