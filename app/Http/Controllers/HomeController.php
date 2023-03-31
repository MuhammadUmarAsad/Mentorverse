<?php

namespace App\Http\Controllers;
use App\Models\Home;
use App\Models\Categories;
use App\Models\Users;
use App\Models\Testimonials;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function view(){
        $home = Home::all();
        $total = Users::all();
        $user = Users::inRandomOrder()->limit(4)->get();
        $categories = Categories::inRandomOrder()->limit(4)->get();
        $testimonial = Testimonials::inRandomOrder()->limit(3)->get();
        $blog = Blog::inRandomOrder()->limit(3)->get();
        $data = compact('home','categories','user','testimonial','blog','total');
        return view('home')->with($data);
    }

    public function Testimonial(){
        $testimonial = Testimonials::inRandomOrder()->get();

        $data = compact('testimonial');
        return view('testimonials')->with($data);
    }
}