<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Packages;
use App\Models\Sessions;
use App\Models\FindTutor;
use Illuminate\Http\Request;
use App\Models\St_Enrolled_Courses;

class BookSession extends Controller
{
    public function Course($Tname, $Sname, $price, $Cid){

        $already = St_Enrolled_Courses::SELECT('course_id','st_username')->WHERE('course_id',$Cid)->WHERE('st_username',$Sname)->get();
        $wallet = Users::SELECT('wallet')->WHERE('username',$Sname)->get();
        $Twallet = Users::SELECT('wallet')->WHERE('username',$Tname)->get();
        $Awallet = Users::SELECT('wallet')->WHERE('username','Admin')->get();

        if(($already->isEmpty()))
        {
            if(($wallet[0]->wallet) > $price){

            $Ubalance = $wallet[0]->wallet - $price;
            $Tbalance = $price * 0.80;
            $Abalance = $price * 0.20;
 
            $Tnew = $Twallet[0]->wallet + $Tbalance;
            $Anew = $Awallet[0]->wallet +  $Abalance;

            Users::WHERE('username', $Sname)->update(['wallet'=>$Ubalance]);
            Users::WHERE('username', $Tname)->update(['wallet'=>$Tnew ]);
            Users::WHERE('username', "Admin")->update(['wallet'=>$Anew ]);
            
            $St_en = new St_Enrolled_Courses;
            $St_en->st_username = $Sname;
            $St_en->course_id = $Cid;
            $St_en->save();
            $title = "You Have successfully purchased a course! access it from Dashboard";

            }
            else{
                $title = "Not Enough Credits";
            }

            $data = compact('title');
            $url = '/DashCourseDetails'.'/'.$Cid;
            return redirect($url)->with('title', $title);
            
        }
        else
        {
            $title = "Already Enrolled";
            $url ='DashCourseDetails/'.$Cid;
           return redirect($url)->with('title', $title);
        }
    }

    // public function session($Tname){
    //     $findTutor = FindTutor::inRandomOrder()->get();

    //     $FT = compact('findTutor');
    //     return view('Dash-Tutors')->with($FT);
    // }
}
