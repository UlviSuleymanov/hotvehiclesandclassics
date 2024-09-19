<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        return view("front/pages/about");
    }

    public function contact(){
        return view("front/pages/contact");
    }
    //Reflection Api işə düşür və dependency injection baş verir.
    public function contactForm(Request $request){
        dd($request->all());
    }
}
