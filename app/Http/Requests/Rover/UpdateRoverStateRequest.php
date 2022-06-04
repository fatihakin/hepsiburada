<?php

namespace App\Http\Requests\Rover;

use App\Models\Rover;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoverStateRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:rovers,id'],
            'commands' => ['required', 'string' , 'max:100'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->validate();
        $validator->after(function ($validator) {
            $commands = collect(str_split($this->request->get('commands')));
            $undefinedRoute = $commands->unique()->filter(function ($item){
               return !in_array($item , Rover::AVAILABLE_ROUTES);
            });
            if ($undefinedRoute->count()){
                $validator->errors()->add('commands', 'You can use only '. implode(',', Rover::AVAILABLE_ROUTES). ' commands for moving');
            }
        });
    }
}
