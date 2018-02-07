<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Physical extends Model
{
    //
    public $table = 'physical';

    public $timestamps = false;

    public $fillable = ['ch_id','part','content'];
}
