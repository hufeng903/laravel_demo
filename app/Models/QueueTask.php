<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueueTask extends Model
{
    //
    protected $fillable = [
        'id',
        'content',
        'updated_at',
        'created_at'
    ];
}
