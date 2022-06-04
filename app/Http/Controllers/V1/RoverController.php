<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Plateau\ShowPlateauRequest;
use App\Http\Requests\Plateau\StorePlateauRequest;
use App\Http\Requests\Rover\ShowRoverRequest;
use App\Http\Requests\Rover\StoreRoverRequest;
use App\Http\Resources\PlateauResource;
use App\Http\Resources\RoverResource;
use App\Repositories\Plateau\PlateauRepositoryInterface;
use App\Repositories\Rover\RoverRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RoverController extends Controller
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
     *      description="Returns a single rover",
     *      @OA\Parameter(
     *         description="Rover Id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
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
    public function show(ShowRoverRequest $request , int $id):RoverResource|null
    {
        return new RoverResource($this->roverRepository->findByIdWithPlateau($id));
    }



}
