<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //
    public function show($id){
        $course = Course::with(['platform', 'topics', 'authors', 'series'])->findOrFail($id);

        return $course;
    }
}
