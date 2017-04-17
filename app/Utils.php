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
    public static function getVipHumans()
    {
        return DB::table('viphuman')->get();
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