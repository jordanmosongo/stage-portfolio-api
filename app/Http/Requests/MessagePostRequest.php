<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagePostRequest extends FormRequest
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
           'message.name' => ['required', 'max:30'],
            'message.email' => ['required', 'max:30'],
            'message.phone' => ['required', 'max:20'],
            'message.object' => ['required', 'max:50'],
            'message.content' => ['required', 'max:255'], 
        ];
    }
}
