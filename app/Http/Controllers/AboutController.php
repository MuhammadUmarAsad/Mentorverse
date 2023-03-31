<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function view()
    {
        $about = About::all();
        $data = compact('about');
        return view('about')->with($data);
    }
}
