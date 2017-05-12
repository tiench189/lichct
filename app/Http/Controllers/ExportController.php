<?php

namespace App\Http\Controllers;

use App\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;

class ExportController extends Controller
{
    //
    private static $FILE_PATH = "/export/";

    public function exportCalendarToWord(Request $request)
    {
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

        $year = intval($request->input('y'));
        if ($year == 0) {
            $year = intval(date("Y"));
        }

        $data = DB::table('calendar')->where([
            ['_week', '=', $week],
            ['viphuman', 'like', "%" . $vip . "%"]])
            ->orderBy('date_note', "ASC")
            ->get();

        $calendars = array();
        foreach ($data as $row) {
            $date = Utils::formatTime2Day($row->date_note);
            if (!isset($calendar[$date])) {
                $calendars[$date] = array();
            }
            $calendars[$date][] = $row;
        }

        return view("export.calendar-to-word",
            ['calendars' => $calendars, 'week' => $week, 'year' => $year, 'vip' => $viphuman]);

//        $file_name = "test.docx";
//
//        $phpWord = new PhpWord();
//        $section = $phpWord->addSection();
//
//        //table header
//        $table_header = $section->addTable();
//        $table_header->addRow();
//
//        //BGD&ĐT
//        $col1_header = $table_header->addCell(6000)->addTextRun();
//        $col1_header->addText("BỘ GIÁO DỤC VÀ ĐÀO TẠO");
//        $col1_header->addTextBreak();
//        $col1_header->addText("VĂN PHÒNG", ['bold' => true]);
//
//
//        //write file
//        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
//        $file = ExportController::$FILE_PATH . $file_name;
//        $objWriter->save($file);

        // Your browser will name the file "myFile.docx"
// regardless of what it's named on the server

        //
//        header("Content-Disposition: attachment; filename='myFile.docx'");
//        readfile($temp_file); // or echo file_get_contents($temp_file);
//        unlink($temp_file);  // remove temp file
    }
}
