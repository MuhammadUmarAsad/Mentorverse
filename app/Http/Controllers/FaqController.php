<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function view(){
        $FAQ = Faq::all();

        $f = compact('FAQ');
        return view('faqs')->with($f);
    }
}
