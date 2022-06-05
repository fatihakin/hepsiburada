<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RoverStateResource
 * @package App\Http\Resources
 * @OA\Schema()
 */
class RoverStateResource extends JsonResource
{
    /**
     * @OA\Property(format="int64", title="ID", default=1, description="ID", property="id"),
     * @OA\Property(format="integer", title="rover_id", default="1", description="rover_id", property="rover_id"),
     * @OA\Property(format="object", title="rover", description="rover", property="rover", ref="#/components/schemas/RoverResource"),
     * @OA\Property(format="integer", title="old_x_coordinate", default="0", description="old_x_coordinate", property="old_x_coordinate")
     * @OA\Property(format="integer", title="old_y_coordinate", default="0", description="old_y_coordinate", property="old_y_coordinate")
     * @OA\Property(format="integer", title="old_facing", default="0", description="old_facing", property="old_facing")
     * @OA\Property(format="integer", title="new_x_coordinate", default="0", description="new_x_coordinate", property="new_x_coordinate")
     * @OA\Property(format="integer", title="new_y_coordinate", default="0", description="new_y_coordinate", property="new_y_coordinate")
     * @OA\Property(format="integer", title="new_facing", default="0", description="new_facing", property="new_facing")
     * @OA\Property(format="integer", title="group", default="0", description="group", property="group")
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rover_id' => $this->rover_id,
            'rover' => new RoverResource($this->whenLoaded('rover')),
            'old_x_coordinate' => $this->old_x_coordinate,
            'old_y_coordinate' => $this->old_y_coordinate,
            'old_facing' => $this->old_facing,
            'command' => $this->command,
            'new_x_coordinate' => $this->new_x_coordinate,
            'new_y_coordinate' => $this->new_y_coordinate,
            'new_facing' => $this->new_facing,
            'group' => $this->group,
        ];
    }
}
