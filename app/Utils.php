<?php
/**
 * Created by PhpStorm.
 * User: Windows 10 Gamer
 * Date: 01/04/2017
 * Time: 9:01 SA
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Utils extends Model
{
    public static function getVipHumans($week)
    {
        $vip =  DB::table('viphuman')->get();
        $data = array();
        foreach ($vip as $row){
            $temp = array();
            $temp['id'] = $row->id;
            $temp['name'] = $row->name;
            $count =DB::table('calendar')->where([
                ['_week', '=', $week],
                ['viphuman', 'like', "%".$row->id."%"]])
                ->select('id')
                ->get();
            $temp['count'] = count($count);
            $data[] = $temp;
        }
        return $data;
    }

    public static function countInWeek($week){
        $count =DB::table('calendar')->where('_week', '=', $week)
            ->select('id')
            ->get();
        return count($count);
    }

    public static function formatTime2Day($date)
    {
        $strdate = date("d/m/Y", strtotime($date));
        return self::dayOfWeek($date) . ", " .$strdate;
    }

    public static function dayOfWeek($date)
    {
        $strday = date("N", strtotime($date));
        if ($strday == "1"){
            return "Thứ 2";
        }else if ($strday == "2"){
            return "Thứ 3";
        }else if ($strday == "3"){
            return "Thứ 4";
        }else if ($strday == "4"){
            return "Thứ 5";
        }else if ($strday == "5"){
            return "Thứ 6";
        }else if ($strday == "6"){
            return "Thứ 7";
        }else{
            return "Chủ nhật";
        }
    }

    public static function timeInDay($date){
        return date('G:i', strtotime($date));
    }

}