<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class customAuth
{
    /** *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         $path = $request->path();
        
// Session True 
        if (session()->has('user') && ($path!='login' && $path!='Home' && $path!='/' && $path!='About' && $path!="Find Tutor" && $path!='BecomeTutor' && $path!='FindCourse' && $path!='testimonials' && $path!='singleTutor/{name}' && $path!='singleCourse/{id}' && $path!='faqs' && $path!='contact' && $path!='register'))  // session has username
            {
            //echo $next($request);
            //echo $path;
            return $next($request);   // only then serve next request
            }   
        else if($path=='login' && ( !session()->has('user')))
        {
          //echo $next($request);
          //echo $path;
             return $next($request);
          }

        else if(( !session()->has('user'))){
             return $next($request);
          }

        else if(($path=='login' || $path=='Home' || $path=='/' || $path=='About' || $path=="Find Tutor" || $path=='BecomeTutor' || $path=='FindCourse' || $path=='testimonials' || $path=='singleTutor/{name}' || $path=='singleCourse/{id}' || $path=='faqs' || $path=='contact' || $path=='register' || $path=='TutorDashboard' || $path=='AdminDashboard') && ( Session::get('user')['status']=="student"))
        {
             return redirect('/StudentDashboard');
          }

        else if(($path=='login' || $path=='Home' || $path=='/' || $path=='About' || $path=="Find Tutor" || $path=='BecomeTutor' || $path=='FindCourse' || $path=='testimonials' || $path=='singleTutor/{name}' || $path=='singleCourse/{id}' || $path=='faqs' || $path=='contact' || $path=='register' || $path=='AdminDashboard' || $path=='StudentDashboard') && ( Session::get('user')['status']=="tutor"))
        {
             return redirect('/TutorDashboard');
          }

        else if(($path=='login' || $path=='Home' || $path=='/' || $path=='About' || $path=="Find Tutor" || $path=='BecomeTutor' || $path=='FindCourse' || $path=='testimonials' || $path=='singleTutor/{name}' || $path=='singleCourse/{id}' || $path=='faqs' || $path=='contact' || $path=='register' || $path=='TutorDashboard' || $path=='StudentDashboard') && ( Session::get('user')['status']=="admin"))
        {
         return redirect('/AdminDashboard');
     }

    }
}
