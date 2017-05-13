<?php

namespace App\Http\Controllers;

use App\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
        if (!$request->session()->has('auth') || !$request->session()->get('auth')){
//            return view('authfailed');
            $request->session()->put('auth', true);
            $request->session()->put('username', 'account');
            $request->session()->put('fullname', 'Tài khoản');
        }
        $week = intval($request->input('w'));
        if ($week == 0) {
            $week = intval(date("W"));
        }
        $viphuman = $request->input('v');
        if (isset($viphuman) && $viphuman != "") {
            $vip = "|" . $viphuman . "|";
        } else {
            $vip = "";
        }
        $data = DB::table('calendar')->where([
            ['_week', '=', $week],
            ['viphuman', 'like', "%" . $vip . "%"]])
            ->orderBy('date_note', "ASC")
            ->get();
        $calendar = array();
        foreach ($data as $row) {
            $date = Utils::formatTime2Day($row->date_note);
            if (!isset($calendar[$date])) {
                $calendar[$date] = array();
            }
            $calendar[$date][] = $row;
        }
        return view("index", ['calendar' => $calendar, 'week' => $week, 'vip' => $viphuman]);
    }

    public function formCalendar(Request $request)
    {
        if (!$request->session()->has('auth') || !$request->session()->get('auth')){
            return view('authfailed');
        }
        $id = intval($request->input('id'));
        $week = intval($request->input('w'));
        if ($week == 0) {
            $week = intval(date("W"));
        }
        $vip = DB::table('viphuman')->get();
        $unit = DB::table('unit')->where('parent_id', '>', 0)->get();
        $arrunit = array();
        foreach ($unit as $row) {
            $arrunit[] = $row->name;
        }
        $calendar = null;
        if ($id > 0) {
            $calendar = DB::table('calendar')->where('id', $id)->first();
        }
        return view("calendar.add", ['week' => $week, 'vip' => $vip, 'unit' => $unit, 'id' => $id,
            'calendar' => $calendar, 'arrunit' => $arrunit]);
    }

    public function addCalendar(Request $request)
    {
        if (!$request->session()->has('auth') || !$request->session()->get('auth')){
            return view('authfailed');
        }
        $id = intval($request->input('id'));
        $date = $request->input('date_note');
        $time = $request->input('time_in_day');
        $date_note = \DateTime::createFromFormat('d/m/Y H:i', $date . ' ' . $time);
        $week = $request->input('week');
        $member = "";
        if (count($request->input('member')) > 0) {
            $member = implode("; ", $request->input('member'));
        }
        $vip = "|" . implode("|", $request->input('viphuman'));
        $content = $request->input('content');
        if ($id == 0) {
            $result = DB::table('calendar')->insert([
                'viphuman' => $vip,
                'content' => $content,
                'date_note' => $date_note,
                '_week' => $week,
                'member' => $member
            ]);
            return redirect()->action(
                'IndexController@index', ['w' => $week]
            );
        } else {
            $result = DB::table('calendar')->where('id', '=', $id)->update([
                'viphuman' => $vip,
                'content' => $content,
                'date_note' => $date_note,
                '_week' => $week,
                'member' => $member
            ]);
            return redirect()->action(
                'IndexController@index', ['w' => $week]
            );
        }

    }

    #region Nguoidung Delete
    public function deleteCalendar(Request $request)
    {
        $callback = $request->input('back');
        $result = DB::table('calendar')->where('id', $request->input('id'))->delete();
        return redirect($callback);
    }

    public function autoLogin(Request $request)
    {
        $username = $request->username;
        $fullname = $request->fullname;
        $sesskey = $request->sesskey;
        if (!isset($username) || !isset($fullname) || !isset($sesskey)) {
            return redirect()->action('IndexController@authenFailed');
        }
        if ($sesskey != md5($username . date("Ymd") . env("SESSKEY"))) {
            return redirect()->action('IndexController@authenFailed');
        }

        $request->session()->put('auth', true);
        $request->session()->put('username', $username);
        $request->session()->put('fullname', $fullname);
        return redirect()->action('IndexController@index');
    }

    public function authenFailed(Request $request){
        return view('authfailed');
    }
}
