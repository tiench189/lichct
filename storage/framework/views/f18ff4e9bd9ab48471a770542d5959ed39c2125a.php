<?php $__env->startSection('page-title'); ?>
    Lịch công tác
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="text-center title">ĐĂNG KÍ LỊCH CÔNG TÁC</div>
    <?php echo Form::open(array('id' => 'add-calendar', 'route' => 'add-calendar', 'class' => 'form')); ?>

    <input type="hidden" value="<?php echo e($id); ?>" name="id">
    <?php $year = date("Y"); ?>
    <table class="table table-borderless">
        <tr>
            <td class="left-label">
                1. Tuần chọn:
            </td>
            <td>
                <div class="form-group form-inline">
                    <input type="text" id="week-picker" value="<?php echo e($week); ?>" class="form-control input-week" required
                           name="week">
                    <i>(Từ <span
                                id="start-week"><?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."1") )); ?></span>
                        đến <span
                                id="end-week"><?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."7") )); ?></span>)</i>
                </div>
            </td>
        </tr>
        <tr>
            <td class="left-label">
                2. Ngày:
            </td>
            <td>
                <table class="table table-borderless table-day">
                    <tr>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_2"
                                       value="<?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."1") )); ?>"
                                       required>
                                Thứ 2
                                <div id="d_2"><?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."1") )); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_3"
                                       value="<?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."2") )); ?>">
                                Thứ 3
                                <div id="d_3"><?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."2") )); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_4"
                                       value="<?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."3") )); ?>">
                                Thứ 4
                                <div id="d_4"><?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."3") )); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_5"
                                       value="<?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."4") )); ?>">
                                Thứ 5
                                <div id="d_5"><?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."4") )); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_6"
                                       value="<?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."5") )); ?>">
                                Thứ 6
                                <div id="d_6"><?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."5") )); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_7"
                                       value="<?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."6") )); ?>">
                                Thứ 7
                                <div id="d_7"><?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."6") )); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_8"
                                       value="<?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."7") )); ?>">
                                Chủ nhật
                                <div id="d_8"><?php echo e(date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."7") )); ?></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="left-label">3. Lãnh đạo:</td>
            <td>
                <div class="form-group form-inline">
                    <?php $__currentLoopData = $vip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="checkbox" name="viphuman[]" vip="<?php echo e($v->name); ?>"
                               value="<?php echo e($v->id); ?>" <?php echo e(($id > 0 && strpos($calendar->viphuman, '|'.$v->id."|") !== false)?'checked':''); ?>> <?php echo e($v->name); ?>

                        &nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="left-label">4. Thời gian:</td>
            <td>
                <div class="input-group clockpicker input-clock" data-align="top" data-autoclose="true">
                    <input type="text" class="form-control" name="time_in_day" id="time_in_day" required
                           value="<?php echo e(($id > 0)?date('G:i', strtotime($calendar->date_note)):''); ?>">
                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
                </div>
            </td>
        </tr>
        <tr>
            <td class="left-label">5. Tham dự:</td>
            <td>
                <select id="member" name="member[]" class="form-control select-multiple ipw"
                        multiple="multiple">
                    <?php if($id > 0): ?>
                        <?php $member = explode(";", $calendar->member)?>
                        <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c->name); ?>" <?php echo e(in_array($c->name, $member)?'selected':''); ?>><?php echo e($c->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!in_array($m, $arrunit)): ?>
                                <option value="<?php echo e($m); ?>" selected><?php echo e($m); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c->name); ?>"><?php echo e($c->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="left-label">6. Nội dung:</td>
            <td>
                <textarea class="form-control" rows="2" name="content"
                          required><?php echo e(($id > 0)?$calendar->content:''); ?></textarea>
            </td>
        </tr>
    </table>


    <div class="form-group form-inline pull-right">
        <input type="submit" class="form-control btn-my" value="Lưu thay đổi">
        <input type="reset" class="form-control btn-my" value="Làm lại">
    </div>
    <?php echo Form::close(); ?>

    <script src="<?php echo e(env('ALIAS')); ?>/js/jquery-clockpicker.js"></script>
    <script>
        convertToWeekPicker($("#week-picker"));
        $('.clockpicker').clockpicker();

        $(".select-multiple").select2({
            tags: true
        });
        <?php if($id > 0): ?>
        $("input[name='date_note']").each(function () {
            if ($(this).val() == "<?php echo e(date("d/m/Y", strtotime($calendar->date_note))); ?>") {
                $(this).prop('checked', true);
            }
        });
        <?php endif; ?>
        $("input[name='viphuman[]']").change(function () {
            var content = '';

            $("input[name='viphuman[]']:checked").each(function (idx) {
                if ($("input[name='viphuman[]']:checked").length == 4) {
                    content = "Chánh Văn Phòng và các PCVP "
                } else {
                    content += $(this).attr('vip');
                    if (idx == $("input[name='viphuman[]']:checked").length - 2) {
                        content += ' và ';
                    } else if (idx == $("input[name='viphuman[]']:checked").length - 1) {
                        content += ' ';
                    } else {
                        content += ", ";
                    }
                }

            });

            $("textarea[name='content']").html(content);
        });

        $('#add-calendar').submit(function () {
            var atLeastOnePersonChose = $('input[name="viphuman[]"]:checked').length > 0;

            if (!atLeastOnePersonChose) {
                alert("Vui lòng chọn lãnh đạo");
                return false;
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>