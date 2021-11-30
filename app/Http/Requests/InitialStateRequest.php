<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InitialStateRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules()
    {
        return [
            'rooms'    => 'required|numeric|min:1',
            'guests'   => 'required|numeric|min:1',
        ];
    }
}
