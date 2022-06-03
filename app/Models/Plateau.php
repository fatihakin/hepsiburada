<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plateau extends Model
{
    use HasFactory;
    protected $table='plateaus';
    protected $fillable=['name', 'x_coordinate', 'y_coordinate'];
}
