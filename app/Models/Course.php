<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function students()
    {
        return $this->hasMany(CourseStudent::class);
    }
}
