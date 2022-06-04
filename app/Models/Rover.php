<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rover extends Model
{
    use HasFactory;

    const FACING_TYPES = ['N','S','E','W'];
    protected $fillable=['plateau_id', 'name', 'x_coordinate', 'y_coordinate','facing'];

    public function plateau(){
        return $this->belongsTo(Plateau::class);
    }
}