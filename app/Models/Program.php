<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function program_courses(){
        return $this->hasMany(ProgramCourses::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
