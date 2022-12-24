<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //
    public function show($slug){
        $course = Course::where('slug', $slug)->with(['platform', 'topics', 'authors', 'series', 'reviews'])->first();

        if(empty($course)){
            return abort(404);
        }

//        return response()->json($course);

        return view('course.single', [
            'course' => $course
        ]);
    }
}
