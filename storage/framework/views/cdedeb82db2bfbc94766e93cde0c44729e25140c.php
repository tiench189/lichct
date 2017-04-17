<?php $__env->startSection('page-title'); ?>
    <?php echo e(($id == 0)?"Thêm":"Chỉnh sửa"); ?> nguồn chỉ đạo
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="text-center title"><?php echo e(($id == 0)?"Thêm":"Chỉnh sửa"); ?> nguồn chỉ đạo</div>
    <?php if( $errors->count() > 0 ): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p  class="alert alert-danger"><?php echo e($message); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php echo Form::open(array('route' => 'sourcesteering-update', 'class' => 'form', 'files'=>'true')); ?>

    <div class="form-group form-inline">
        <label>Loại nguồn:</label>
        <select name="type" class="form-control">
            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($t->id); ?>" <?php echo e(($id == 0 || $t->id != $steering->type)?'':'selected'); ?>><?php echo e($t->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group form-inline">
        <label>Số kí hiệu: <span class="required">(*)</span></label>
        <input type="text" required name="code" class="form-control" value="<?php echo e(($id == 0)?"":$steering->code); ?>">
    </div>
    <div class="form-group form-inline">
        <label>Trích yếu: <span class="required">(*)</span></label>
        <textarea name="name" style="width: 100%;" class="form-control" required><?php echo e(($id == 0)?"":$steering->name); ?></textarea>
    </div>
    <div class="form-group form-inline">
        <label>Ngày ban hành: <span class="required">(*)</span></label>
        <input id="my-time" name="time" type="text" class="form-control datepicker" required value="<?php echo e(($id == 0)?"":date("d/m/y", strtotime($steering->time))); ?>">
    </div>
    <div class="form-group form-inline">
        <label>Người ký:</label>
        <input type="text" name="sign_by" class="form-control" value="<?php echo e(($id == 0)?"":$steering->sign_by); ?>">
    </div>
    <div class="form-group form-inline">
        <label style="float: left">File đính kèm:</label>
        <?php echo Form::file('docs', array('class'=>'')); ?>

    </div>
    <div class="form-group form-inline hidden">
        <label>Hoàn thành:</label>
        <input name="complete" type="checkbox"  class="form-control" <?php echo e(($id > 0 && $steering->status == 1)?"checked":""); ?>>
    </div>
    <input name="id" value="<?php echo e($id); ?>" type="hidden">

    <div class="form-group">
        <?php echo Form::submit('Hoàn tất',
          array('class'=>'btn btn-my')); ?>

    </div>
    <?php echo Form::close(); ?>

    <script>$(document).ready(function () {
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>