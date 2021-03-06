<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\V1\V1ApiController;
use App\Http\Requests\Rover\ShowRoverRequest;
use App\Http\Requests\Rover\UpdateRoverStateRequest;
use App\Http\Resources\RoverResource;
use App\Libraries\Area;
use App\Libraries\Facing;
use App\Models\Rover;
use App\Models\RoverState;
use App\Repositories\Rover\RoverRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RoverController extends V1ApiController
{
    private RoverRepositoryInterface $roverRepository;

    public function __construct(RoverRepositoryInterface $roverRepository)
    {
        $this->roverRepository = $roverRepository;
    }

    /**
     * @OA\Get(
     *      path="/rovers/{id}",
     *      operationId="findRoverById",
     *      tags={"Rovers"},
     *      summary="Find a single rover by id",
     *      description="Returns a single rover. If you would like to see desired state of rover, you can use this API",
     *      @OA\Parameter(
     *         description="Rover Id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="Rover ID"),
     *      ),
     *      @OA\Response(response=200, description="success", @OA\JsonContent(ref="#/components/schemas/RoverResource")),
     *      @OA\Response(response=404, description="resource not found",@OA\JsonContent(ref="#/components/schemas/NotFoundHttpException"))
     *     )
     * Display the specified resource.
     *
     * @param ShowRoverRequest $request
     * @param int $id
     * @return RoverResource|null
     */
    public function show(ShowRoverRequest $request, int $id): RoverResource|null
    {
        return new RoverResource($this->roverRepository->findByIdWithPlateau($id));
    }

    /**
     * @OA\Put(
     *     path="/rovers/{id}/update-state",
     *     summary="Update state of rover by using commands",
     *     description="Available commands are 'L','R','M'",
     *     operationId="updateRoverStateByCommand",
     *     tags={"Rovers"},
     *     @OA\Parameter(
     *         description="Rover Id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="string", value="LMLMRLM", summary="Combination of consecutive commands"),
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 ref="#/components/schemas/UpdateRoverStateRequest",
     *             )
     *         )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function updateState(UpdateRoverStateRequest $request, int $id)
    {
        /**
         * @var Rover $rover
         */
        $rover = $this->roverRepository->findByIdWithPlateau($id);
        $commands = collect(str_split($request->validated('commands')));
        $area = new Area($rover->plateau->x_coordinate, $rover->plateau->y_coordinate);
        $latestRoverState = RoverState::query()->where('rover_id', $rover->id)->latest('id')->first();
        $group = 1;
        if ($latestRoverState && $latestRoverState->group) {
            $group = $latestRoverState->group + 1;
        }
        $roverStates = collect();
        foreach ($commands as $command) {
            $roverState = new RoverState();
            $currentFacing = $rover->facing;

            $roverState->rover_id = $rover->id;
            $roverState->old_x_coordinate = $rover->x_coordinate;
            $roverState->old_y_coordinate = $rover->y_coordinate;
            $roverState->old_facing = $currentFacing;
            $roverState->command = $command;
            $roverState->group = $group;

            $facing = new Facing($currentFacing, $command);
            $rover->facing = $facing()->getNewFacing();
            list($rover->x_coordinate, $rover->y_coordinate) = $area->findNewCoordinatesByFacing($rover->facing, $rover->x_coordinate, $rover->y_coordinate);

            $roverState->new_x_coordinate = $rover->x_coordinate;
            $roverState->new_y_coordinate = $rover->y_coordinate;
            $roverState->new_facing = $rover->facing;
            $roverStates->push($roverState);
        }
        DB::beginTransaction();
        $roverStates->each(function (RoverState $roverState) {
            $roverState->save();
        });
        $rover->save();
        DB::commit();
        return response()->noContent(ResponseAlias::HTTP_OK);
    }
}
