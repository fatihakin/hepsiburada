<?php

namespace App\Models;

use App\Libraries\Area;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rover extends Model
{
    use HasFactory;

    /**
     * sorted by direction
     */
    const FACING_TYPES = ['N', 'E', 'S', 'W'];
    const AVAILABLE_ROUTES = ['L', 'R', 'M'];
    protected $fillable = ['plateau_id', 'name', 'x_coordinate', 'y_coordinate', 'facing'];

    public function plateau()
    {
        return $this->belongsTo(Plateau::class);
    }

    public static function changeState($newFace, $x, $y, Area $area)
    {
        if ($newFace == 'N') {
            if ($y < $area->getYMax()){
                $y++;
            }
        } else if ($newFace == 'E') {
            if ($x < $area->getXMax()){
                $x++;
            }
        } else if ($newFace == 'S') {
            if ($y > $area->getYMin()){
                $y--;
            }
        } else if ($newFace == 'W') {
            if ($x > $area->getXMin()){
                $x--;
            }
        }

        return [$x, $y];
    }
}
