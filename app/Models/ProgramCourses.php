<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCourses extends Model
{
    use HasFactory;

    public function program_course_titles()
    {
        return $this->hasMany(ProgramCourseTitles::class);
    }
}
