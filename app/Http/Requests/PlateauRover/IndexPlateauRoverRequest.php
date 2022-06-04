<?php

namespace App\Http\Requests\PlateauRover;

use App\Repositories\Plateau\PlateauRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class IndexPlateauRoverRequest extends FormRequest
{
    private PlateauRepositoryInterface $plateauRepository;

    public function __construct(PlateauRepositoryInterface $plateauRepository)
    {
        $this->plateauRepository = $plateauRepository;
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
        $validator->after(function ($validator) {
            $plateau = $this->plateauRepository->existsById(intval($this->route('plateau')));
            if (!$plateau) {
                $validator->errors()->add('plateau', 'Plateau not found');
            }
        });
    }
}
