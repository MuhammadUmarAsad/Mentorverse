<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FindTutor;
use App\Models\Categories;
use App\Models\Users;

class BecomeTutor extends Controller
{
    // public function BecomeTutorInsert(Request $request)
    // {
       
    // }

    public function update($name, Request $request)
    {
         Users::WHERE('username',$name)->update(['status'=>"tutor"]);
         
         $FindT= new FindTutor;
         $FindT->tutorusername = $name;
         $FindT->introduction = $request['intro'];
         $FindT->expertise = $request['expertise'];
         $FindT->institute = $request['inst'];
         $maj = Categories::select('cat_ID')->where('cat_name',  $request['browser'])->get();
         $FindT->major = $maj[0]->cat_ID;
         $FindT->save();
 
         return redirect ('/TutorDashboard');
    }
}
