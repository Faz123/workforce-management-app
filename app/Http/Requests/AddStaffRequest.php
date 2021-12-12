<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStaffRequest extends FormRequest
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
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'email',
            'contracted_hours' => 'required|numeric|min:0|max:39',
            'staff_number' => 'unique:App\Models\User,staff_number',
            'password' => 'required',
            'password_confirmation' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You must enter a name',
            'surname.required' => 'You must enter a surname',
            'email.email' => 'Please enter a valid email address',

        ];
    }
}
