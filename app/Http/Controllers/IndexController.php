<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index() {
        return view("index");
    }

    public function formCalendar(Request $request){
        return view("calendar.add");
    }

    public function addCalendar(Request $request){
        return view("calendar.add");
    }
}
