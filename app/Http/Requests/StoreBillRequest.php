<?php

namespace App\Http\Requests;

use App\Models\Bill;
use Illuminate\Foundation\Http\FormRequest;

class  StoreBillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user_name = auth()->user()->name;

        return !str_contains($user_name, 'Guest');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Bill::$rules;
    }

    /**
     * Get the validation messages rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return Bill::$messages;
    }
}
