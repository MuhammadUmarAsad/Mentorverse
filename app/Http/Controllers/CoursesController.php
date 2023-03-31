<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function view(){
       $findCourse = Courses::inRandomOrder()->get();
        $FC = compact('findCourse');
        return view('FindCourse')->with($FC);
}

public function DashView(){
    $findCourse = Courses::inRandomOrder()->get();

    $FC = compact('findCourse');
    return view('Dash-courses')->with($FC);
}


public function CourseDetails($id){
    $CourseDetails = Courses::where('course_id',$id)->get();
    $CD = compact('CourseDetails');
    return view('IndividualCoursesD')->with($CD);
}

public function singleCourse($id){
    $CourseDetails = Courses::where('course_id',$id)->get();
    $CD = compact('CourseDetails');
    return view('SingleCourse')->with($CD);
}

}
