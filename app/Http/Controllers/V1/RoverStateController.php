<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoverState\IndexRoverStateRequest;
use App\Http\Resources\RoverStateResource;
use App\Models\RoverState;
use App\Repositories\Rover\RoverRepositoryInterface;
use App\Repositories\RoverState\RoverStateRepositoryInterface;
use Illuminate\Http\Request;

class RoverStateController extends Controller
{
    private RoverStateRepositoryInterface $roverStateRepository;

    public function __construct(RoverStateRepositoryInterface $roverStateRepository)
    {
        $this->roverStateRepository = $roverStateRepository;
    }
    /**
     * @OA\Get(
     *      path="/rovers/{roverId}/rover-states",
     *      operationId="getRoverStatesByRoverId",
     *      tags={"RoverStates"},
     *      summary="Get list of rover states",
     *      description="Returns rover states list",
     *      @OA\Parameter(
     *         description="Rover Id",
     *         in="path",
     *         name="roverId",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *      ),
     *      @OA\Response(response=200, description="success",
     *          @OA\JsonContent(ref="#/components/schemas/RoverStateResource")
     *      ),
     *     )
     */
    public function index(IndexRoverStateRequest $request, int $roverId)
    {
        return RoverStateResource::collection($this->roverStateRepository->getStatesByRover($roverId));
    }


}
