<?php $__env->startSection('page-title'); ?>
    Lịch công tác
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <script language="javascript">
        function deleteCalendar(id) {
            if (confirm("Bạn có muốn xóa?")) {
                document.getElementById("calendar_id").value = id;
                frmxoa.submit();
            }
        }

    </script>
    <?php echo Form::open(array('route' => 'delete-calendar', 'class' => 'form', 'id' => 'frmxoa')); ?>

    <input type="hidden" name="id" id="calendar_id">
    <input type="hidden" name="back" value="<?php echo e(\Request::getRequestUri()); ?>">
    <?php echo Form::close(); ?>

    <div>
        <div style="font-size: 1.1em">
            <div class="text-center pull-left">
                BỘ GIÁO DỤC VÀ ĐÀO TẠO<br>
                <strong>VĂN PHÒNG</strong>
            </div>
        </div>
        <div class="pull-right text-center blur" style="padding-bottom: 40px">
            <strong>LỊCH CÔNG TÁC CỦA LÃNH ĐẠO VĂN PHÒNG</strong><br>
            Tuần <input type="text" id="week-picker" value="<?php echo e($week); ?>" class="form-control input-week blur"><br>
            <i>(Từ <span id="start-week"><?php echo e(date( 'd/m/Y', strtotime( 'monday this week' ) )); ?></span> đến <span
                        id="end-week"><?php echo e(date( 'd/m/Y', strtotime( 'sunday this week' ) )); ?></span>)</i>
        </div>
    </div>
    <div style="position: absolute; margin-top: 70px">
        <a class="btn btn-my" href="/update?w=<?php echo e($week); ?>">Đăng kí lịch</a>
        <a id="export-doc" href="/export-calendar-to-word?w=<?php echo e($week); ?>&vip=<?php echo e($vip); ?>" class="btn btn-primary" style="margin-bottom: 10px">Xuất lịch</a>
    </div>
    <table class="table table-bordered table-calendar">
        <?php $__currentLoopData = $calendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="4" class="blur"><strong><?php echo e($key); ?></strong></td>
            </tr>
            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e(\App\Utils::timeInDay($cal->date_note)); ?></td>
                    <td>
                        <strong><?php echo e($cal->content); ?></strong><br>
                        <i>Thành phần tham dự: </i><?php echo e($cal->member); ?>

                    </td>
                    <td class="td-action"><a href="/update?id=<?php echo e($cal->id); ?>"><img height="20" border="0" src="/img/edit.png" title="Cập nhật lịch"></a></td>
                    <td class="td-action"><a href="javascript:deleteCalendar('<?php echo e($cal->id); ?>')"><img height="20" border="0" src="/img/delete.png" title="Xóa lịch"></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <script>
        convertToWeekPicker($("#week-picker"));
        $("#week-picker").change(function () {
            var old = $(this).val();
            setTimeout(function () {
                if ($("#week-picker").val() == old) {
                    window.location.href = "/?w=" + old + "<?php echo e(($vip == '')?'':'&v='.$vip); ?>"
                }
            }, 500);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>