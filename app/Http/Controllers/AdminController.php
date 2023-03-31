<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Users;
use App\Models\Faq;
use App\Models\About;

class AdminController extends Controller
{
    public function Mailview(){

        $contact = Contact::all();
        $data = compact('contact');
        return view('Admin-Dash-Home')->with($data);
    }

    public function Userview(){

        $user = Users::all();
        $data = compact('user');
        return view('Admin-Dash-Users')->with($data);
    }

    public function faqview(){

        $FAQ = Faq::orderBy('id','DESC')->get();
        $f = compact('FAQ');
        return view('Admin-Dash-Faqs')->with($f);
    }

    public function faqInsert(Request $request){
        $faq= new Faq;
        $faq->question = $request['question'];
        $faq->answer = $request['answer'];
        $faq->save();
        return redirect ('/AdminDashboard/faqs');
    }

    public function faqDelete(Request $Request, $id){
        $faq= Faq::find($id);
        if (!is_null($faq)){
            $faq->delete();
        }
       return redirect('/AdminDashboard/faqs');

    }

    public function AboutView()
    {
        $about = About::all();
        $data = compact('about');
        return view('Admin-Dash-AboutUs')->with($data);
    }

    public function AboutUpdate($id, Request $request)
    {
        //  echo $request['p1'];
        //  echo $request['p2'];

         if ($id=="1"){
        About::WHERE('ID', $id)->update(['paragraph'=>$request['p1']]);
         }

        else if ($id=="2") {
        About::WHERE('ID', $id)->update(['paragraph'=>$request['p2']]);
        }

        else if ($id=="6"){
            echo $id;
        About::WHERE('ID', $id)->update(['Heading'=>$request['p3']]);
          if($request->image1 != null){
            $imageName = ( $request['Heading']).rand().'.'.$request->image1->extension();  
            $request->image1->move(public_path('Images'), $imageName);
            About::WHERE('ID', $id)->update(['Image'=> $imageName]);
        }
    }


        else if ($id=="7"){
        About::WHERE('ID', $id)->update(['Heading'=>$request['p4']]);
        if($request->image2 != null){
          $imageName = ( $request['Heading']).rand().'.'.$request->image2->extension();  
          $request->image2->move(public_path('Images'), $imageName);
          About::WHERE('ID', $id)->update(['Image'=> $imageName]);
      }

        }

        else if ($id=="8"){
        About::WHERE('ID', $id)->update(['Heading'=>$request['p5']]);
        if($request->image3 != null){
          $imageName = ( $request['Heading']).rand().'.'.$request->image3->extension();  
          $request->image3->move(public_path('Images'), $imageName);
          About::WHERE('ID', $id)->update(['Image'=> $imageName]);
      }
        }

         return redirect ('/AdminDashboard/about');
    }

    
    public function Cstatus($name, $st)
    {
        $data = compact('name','st');
        return view('Admin-Dash-changeStatus')->with($data);
    }

    public function store($name, Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'username' => 'required|regex:/^[a-z A-Z 0-9 _]+$/',
            'status' => [
                'required',
                function ($attribute, $value, $fail) {
                    $status_check = array('admin',"tutor",'student');
                    if(!in_array($value, $status_check)){
                        $fail("The :attribute must be admin or tutor or student!");
                    }
                }]
            ]);

        Users::WHERE('username', $name)->update(['status'=>$request['status']]);
        return redirect ('/AdminDashboard/user');
    }

   
}