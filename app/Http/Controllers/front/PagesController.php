<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about(){
        return view("front/pages/about");
    }

    public function contact(){
        return view("front/pages/contact");
    }
}
