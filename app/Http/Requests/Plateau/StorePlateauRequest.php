<?php

namespace App\Http\Requests\Plateau;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema()
 */
class StorePlateauRequest extends FormRequest
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
     * @OA\Property(format="string", default="plateau-10", description="name", property="name"),
     * @OA\Property(format="string", default="27", description="email", property="x_coordinate"),
     * @OA\Property(format="string", default="43", description="y_coordinate", property="y_coordinate"),
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
