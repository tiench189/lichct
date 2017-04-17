<?php

namespace App\Http\Controllers;

use App\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index(Request $request) {
        $week = intval($request->input('w'));
        if ($week == 0){
            $week = intval(date("W"));
        }
        $data=DB::table('calendar')->where('_week', '=', $week)
            ->orderBy('date_note', "ASC")
            ->get();
        $calendar = array();
        foreach ($data as $row){
            $date = Utils::formatTime2Day($row->date_note);
            if (! isset($calendar[$date])){
                $calendar[$date] = array();
            }
            $calendar[$date][] = $row;
        }
        return view("index", ['calendar' => $calendar]);
    }

    public function formCalendar(Request $request){
        return view("calendar.add");
    }

    public function addCalendar(Request $request){
        return view("calendar.add");
    }

}
