<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlateauRover\IndexPlateauRoverRequest;
use App\Http\Requests\PlateauRover\ShowPlateauRoverRequest;
use App\Http\Requests\PlateauRover\StorePlateauRoverRequest;
use App\Http\Resources\RoverResource;
use App\Repositories\PlateauRover\PlateauRoverRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PlateauRoverController extends Controller
{
    private PlateauRoverRepositoryInterface $plateauRoverRepository;

    public function __construct(PlateauRoverRepositoryInterface $plateauRoverRepository)
    {
        $this->plateauRoverRepository = $plateauRoverRepository;
    }

    /**
     * @OA\Get(
     *      path="/plateaus/{plateauId}/rovers",
     *      operationId="getRoversByPlateauId",
     *      tags={"PlateauRovers"},
     *      summary="Get list of rovers by plateauId",
     *      description="Returns rovers list with plateau",
     *      @OA\Parameter(
     *         description="Plateau Id",
     *         in="path",
     *         name="plateauId",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *      ),
     *      @OA\Response(response=200, description="success",
     *          @OA\JsonContent(ref="#/components/schemas/RoverResource")
     *      ),
     *      @OA\Response(response=404, description="resource not found",@OA\JsonContent(ref="#/components/schemas/NotFoundHttpException"))
     *     )
     */
    public function index(IndexPlateauRoverRequest $request, int $plateauId): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return RoverResource::collection($this->plateauRoverRepository->getRoversByPlateauId($plateauId));
    }

    /**
     * @OA\Post(
     *      path="/plateaus/{plateauId}/rovers",
     *      operationId="createRoverByPlateau",
     *      tags={"PlateauRovers"},
     *      summary="Create new rover by plateau",
     *      description="Create new rover with initial position",
     *      @OA\Parameter(
     *         description="Plateau Id",
     *         in="path",
     *         name="plateauId",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 ref="#/components/schemas/StorePlateauRoverRequest",
     *             )
     *         )
     *     ),
     *      @OA\Response(
     *          response=201,
     *          description="Successfully created",
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation Error",
     *      ),
     *     )
     * @param StorePlateauRoverRequest $request
     * @param $plateauId
     * @return Response
     */
    public function store(StorePlateauRoverRequest $request, $plateauId): Response
    {
        $this->plateauRoverRepository->createRoverByPlateau($request->validated(), $plateauId);
        return response()->noContent(ResponseAlias::HTTP_CREATED);
    }
}
