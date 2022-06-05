<?php

namespace App\Http\Requests\Rover;

use App\Models\Rover;
use App\Repositories\Rover\RoverRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema()
 */
class UpdateRoverStateRequest extends FormRequest
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
     * @OA\Property(format="string", default="LMLMLMLMM", description="commands", property="commands"),
     */
    public function rules()
    {
        return [
            'commands' => ['required', 'string' , 'max:100'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->validate();
        $validator->after(function ($validator) {
            $rover = $this->roverRepository->findById($this->route('id'));
            if (!$rover){
                $validator->errors()->add('rover', 'Rover not found');
            }
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
