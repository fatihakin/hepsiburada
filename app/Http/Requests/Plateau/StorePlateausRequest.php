<?php

namespace App\Http\Requests\Plateau;

use Illuminate\Foundation\Http\FormRequest;

class StorePlateausRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string' , 'max:255', 'unique:plateaus,name'],
            'x_coordinate' => ['required', 'integer' , 'max:1000'],
            'y_coordinate' => ['required', 'integer' , 'max:1000'],
        ];
    }
}
