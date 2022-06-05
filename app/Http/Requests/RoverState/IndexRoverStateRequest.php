<?php

namespace App\Http\Requests\RoverState;

use App\Repositories\Rover\RoverRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class IndexRoverStateRequest extends FormRequest
{
    private RoverRepositoryInterface $roverRepository;

    public function __construct(RoverRepositoryInterface $roverRepository)
    {
        $this->roverRepository = $roverRepository;
    }

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
            //
        ];
    }

    public function withValidator($validator)
    {
        $validator->validate();
        $validator->after(function ($validator) {
            $rover = $this->roverRepository->findById($this->route('rover'));
            if (!$rover) {
                $validator->errors()->add('rover', 'Rover not found');
            }
        });
    }
}
