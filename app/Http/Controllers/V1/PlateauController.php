<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Plateau\IndexPlateauRequest;
use App\Http\Requests\Plateau\ShowPlateauRequest;
use App\Http\Requests\Plateau\StorePlateauRequest;
use App\Http\Resources\PlateauResource;
use App\Models\Plateau;
use App\Repositories\Plateau\PlateauRepositoryInterface;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PlateauController extends Controller
{
    private PlateauRepositoryInterface $plateauRepository;

    public function __construct(PlateauRepositoryInterface $plateauRepository)
    {
        $this->plateauRepository = $plateauRepository;
    }

    /**
     * @OA\Post(
     *      path="/plateaus",
     *      operationId="createPlateaus",
     *      tags={"Plateaus"},
     *      summary="Create new plateau",
     *      description="Create a new plateau.",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 ref="#/components/schemas/StorePlateauRequest",
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
     * @param StorePlateauRequest $request
     * @return Response
     */
    public function store(StorePlateauRequest $request): Response
    {
        $this->plateauRepository->createPlateau($request->validated());
        return response()->noContent(ResponseAlias::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/plateaus/{id}",
     *      operationId="findPlateauById",
     *      tags={"Plateaus"},
     *      summary="Find a single plateau by id",
     *      description="Returns a single plateau",
     *      @OA\Parameter(
     *         description="Plateau Id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *      ),
     *      @OA\Response(response=200, description="success", @OA\JsonContent(ref="#/components/schemas/PlateauResource")),
     *      @OA\Response(response=404, description="resource not found",@OA\JsonContent(ref="#/components/schemas/NotFoundHttpException"))
     *     )
     */
    public function show(ShowPlateauRequest $request, $id)
    {
        return new PlateauResource($this->plateauRepository->findById($id));
    }

    /**
     * @OA\Get(
     *      path="/plateaus",
     *      operationId="getPlateaus",
     *      tags={"Plateaus"},
     *      summary="Get list of plateaus",
     *      description="Returns plateaus list",
     *      @OA\Response(response=200, description="success",
     *          @OA\JsonContent(ref="#/components/schemas/PlateauResource")
     *      ),
     *     )
     */
    public function index(IndexPlateauRequest $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PlateauResource::collection($this->plateauRepository->getAll());
    }

}
