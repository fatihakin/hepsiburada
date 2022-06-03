<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PlateauResource
 * @package App\Http\Resources
 * @OA\Schema()
 */
class PlateauResource extends JsonResource
{
    /**
     * @OA\Property(format="int64", title="ID", default=1, description="ID", property="id"),
     * @OA\Property(format="string", title="name", default="plateau-1", description="name", property="name"),
     * @OA\Property(format="string", title="x_coordinate", default="10", description="x_coordinate", property="x_coordinate")
     * @OA\Property(format="string", title="y_coordinate", default="10", description="y_coordinate", property="y_coordinate")
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'x_coordinate' => $this->x_coordinate,
            'y_coordinate' => $this->y_coordinate,
        ];
    }
}
