<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RoverResource
 * @package App\Http\Resources
 * @OA\Schema()
 */
class RoverResource extends JsonResource
{
    /**
     * @OA\Property(format="int64", title="ID", default=1, description="ID", property="id"),
     * @OA\Property(format="string", title="plateau_id", default="1", description="plateau_id", property="plateau_id"),
     * @OA\Property(format="object", title="plateau", description="plateau", property="plateau", ref="#/components/schemas/PlateauResource"),
     * @OA\Property(format="string", title="name", default="rover-1", description="name", property="name"),
     * @OA\Property(format="string", title="x_coordinate", default="10", description="x_coordinate", property="x_coordinate")
     * @OA\Property(format="string", title="y_coordinate", default="10", description="y_coordinate", property="y_coordinate")
     * @OA\Property(format="string", title="facing", default="N", description="facing", property="facing")
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'plateau_id' => $this->plateau_id,
            'plateau' => new PlateauResource($this->whenLoaded('plateau')),
            'name' => $this->name,
            'x_coordinate' => $this->x_coordinate,
            'y_coordinate' => $this->y_coordinate,
            'facing' => $this->facing,
        ];
    }
}
