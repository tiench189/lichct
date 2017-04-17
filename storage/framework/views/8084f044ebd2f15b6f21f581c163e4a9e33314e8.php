<?php $__env->startSection('page-title'); ?>
    Lịch công tác
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div style="font-size: 1.1em">
        <div class="text-center pull-left">
            BỘ GIÁO DỤC VÀ ĐÀO TẠO<br>
            <strong>VĂN PHÒNG</strong>
        </div>
    </div>
    <div class="pull-right text-center blur">
        <strong>LỊCH CÔNG TÁC CỦA LÃNH ĐẠO VĂN PHÒNG</strong><br>
        Tuần <input type="text" id="week-picker" value="<?php echo e(date("W")); ?>" class="form-control" style="width: 45px; display: initial; color: blue"><br>
        <i>(Từ <span id="start-week"><?php echo e(date( 'd/m/Y', strtotime( 'monday this week' ) )); ?></span> đến <span id="end-week"><?php echo e(date( 'd/m/Y', strtotime( 'sunday this week' ) )); ?></span>)</i>
    </div>
    <script>
        convertToWeekPicker($("#week-picker"));
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>