<?php
$file_name = "Lịch công tác Tuần $week-$year";
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; Filename=$file_name.doc")
?>
        <!doctype html>
<html xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Lịch công tác</title>

    <style>
        v\: * {
            behavior: url(#default#VML);
        }

        o\: * {
            behavior: url(#default#VML);
        }

        w\: * {
            behavior: url(#default#VML);
        }

        .shape {
            behavior: url(#default#VML);
        }

        .text-center {
            text-align: center;
        }

        .table-bordered {
            border-collapse: collapse;
        }

        .table-bordered td {
            border: 1px solid black;
        }

        .font-11 {
            font-size: 11pt;
        }

        .font-13 {
            font-size: 13pt;
        }

        @page  {
            size: 21cm 29.7cm;  /* A4 */
            margin: 2cm 2cm 2cm 2.5cm;
            mso-page-orientation: portrait;
        }

        @page  WordSection1 {
            mso-title-page: no;
            mso-paper-source: 0;
            mso-header-margin: 0;
            mso-footer-margin: 0;
        }

        div.WordSection1 {
            page: WordSection1;
            mso-header-margin: 0;
            mso-footer-margin: 0;
        }
    </style>
</head>
<body>
<div class="WordSection1">
    <table width="100%">
        <tr>
            <td width="40%" class="text-center">
                <p style="font-size: 13pt">
                    BỘ GIÁO DỤC VÀ ĐÀO TẠO <br/>
                    <strong>VĂN PHÒNG</strong>
                </p>
            </td>
            <td width="60%" class="text-center text-blue">
                <p>
                    <strong style="color: blue; font-size: 13pt">LỊCH CÔNG TÁC LÃNH ĐẠO VĂN PHÒNG
                        <br> Tuần <?php echo e($week); ?>

                        <br> <em>(Từ ngày <?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."1") )); ?> đến <?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."7") )); ?>)</em>
                    </strong>
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" id="content" class="table-bordered" cellpadding="3px">
        <?php $__currentLoopData = $calendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $cal_items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="2" height="30px">
                    <p>
                        <strong style="color: blue; text-transform: uppercase">&nbsp;<?php echo e($date); ?></strong>
                    </p>
                </td>
            </tr>

            <?php $__currentLoopData = $cal_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center" width="20%">
                        <p>
                            <?php echo e(\App\Utils::timeInDay($cal->date_note)); ?><br>
                        </p>
                    </td>
                    <td width="80%">
                        <p>
                            <strong> <?php echo e($cal->content); ?></strong><br>
                            <i> Thành phần tham dự: </i><?php echo e($cal->member); ?>

                        </p>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <br>
    <table width="100%">
        <tr>
            <td width="50%">
                <p>
                    <strong class="font-11"><em>Nơi nhận:</em></strong>
                </p>
            </td>
            <td width="50%" class="text-center" style="vertical-align: text-top">
                <p>
                    <strong class="font-13">CHÁNH VĂN PHÒNG</strong>
                </p>
            </td>
        </tr>
        <tr>
            <td width="50%" class="font-11">
                <p>
                    - Như trên;
                    <br>- Bộ trưởng (để báo cáo);
                    <br>- TT. P.M.Hùng (để báo cáo);
                    <br>- Chuyên viên Phòng Tổng hợp;
                    <br>- Lưu: VT, TH.
                </p>
            </td>
            <td></td>
        </tr>
    </table>
</div>
</body>
</html>
