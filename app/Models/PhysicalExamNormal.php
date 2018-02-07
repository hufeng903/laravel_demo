<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalExamNormal extends Model
{
    public $table = 'new_physical_exam_normals';
    public $timestamps = false;

    public function scopeStatus($query)
    {
        return $query->where('status',1);
    }
}
