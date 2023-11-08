<?php

namespace App\Http\Requests\tasks;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'min:5|max:64',
            'description' => 'min:10|max:1000',
            'status' => '',
        ];
    }
}
