<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Plateau\StorePlateausRequest;
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
     * @OA\Get(
     *      path="/plateaus",
     *      operationId="getPlateausList",
     *      tags={"Plateaus"},
     *      summary="Get list of plateaus",
     *      description="Returns list of plateaus",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        return 'ASD';
    }

    /**
     * @OA\Post(
     *      path="/plateaus",
     *      operationId="createPlateaus",
     *      tags={"Plateaus"},
     *      summary="Create new plateau",
     *      description="Create new plateau",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="x_coordinate",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="y_coordinate",
     *                     type="integer"
     *                 ),
     *                 example={"name": "plateau-1", "x_coordinate": "32", "y_coordinate": "45"}
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successfully created",
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation Error",
     *      ),
     *     )
     */
    public function store(StorePlateausRequest $request)
    {
        $this->plateauRepository->createPlateau($request->all());
        return response()->noContent(ResponseAlias::HTTP_CREATED);
    }

}
