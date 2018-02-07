<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalPosition extends Model
{
    //
    public $table = 'physical_position';

    public $timestamps = false;

    public $fillable = ['bak'];
}
