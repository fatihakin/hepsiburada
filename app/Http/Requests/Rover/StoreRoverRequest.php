<?php

namespace App\Http\Requests\Rover;

use App\Models\Rover;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @OA\Schema()
 */
class StoreRoverRequest extends FormRequest
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
     * @OA\Property(format="string", default="rover-10", description="name", property="name"),
     * @OA\Property(format="string", default="0", description="email", property="x_coordinate"),
     * @OA\Property(format="string", default="0", description="y_coordinate", property="y_coordinate"),
     * @OA\Property(format="string", default="N", description="facing", property="facing"),
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string' , 'max:255', 'unique:rovers,name'],
            'x_coordinate' => ['required', 'integer' , 'max:1000'],
            'y_coordinate' => ['required', 'integer' , 'max:1000'],
            'facing' => ['required', 'string' , Rule::in(Rover::FACING_TYPES)],
        ];
    }
}
