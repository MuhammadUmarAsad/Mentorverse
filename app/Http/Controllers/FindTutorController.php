<?php

namespace App\Http\Controllers;
use App\Models\FindTutor;
use Illuminate\Http\Request;

class FindTutorController extends Controller
{
    public function view(){
        $findTutor = FindTutor::inRandomOrder()->get();

        $FT = compact('findTutor');
        return view('FindATutor')->with($FT);
    }

    public function DashView(){
        $findTutor = FindTutor::inRandomOrder()->get();

        $FT = compact('findTutor');
        return view('Dash-Tutors')->with($FT);
    }

    public function TutorDetails($name){
        $TutorDetails = FindTutor::where('tutorusername',$name)->get();
        $FT = compact('TutorDetails');
        return view('IndividualTutorD')->with($FT);
    }

    public function singleTutor($name){
        $TutorDetails = FindTutor::where('tutorusername',$name)->get();
        $FT = compact('TutorDetails');
        return view('SingleTutor')->with($FT);
    }

    public function uploadCourse(){
        return view('uploadCourse');
    }
    
}
