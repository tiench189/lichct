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
    public static function getVipHumans(){
        return DB::table('viphuman')->get();
    }

}