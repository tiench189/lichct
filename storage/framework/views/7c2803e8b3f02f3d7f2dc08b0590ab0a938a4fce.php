<?php $__env->startSection('page-title'); ?>
    <?php echo e(($id == 0)?"Thêm":"Chỉnh sửa"); ?> nhóm người sử dụng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="text-center title"><?php echo e(($id == 0)?"Thêm":"Chỉnh sửa"); ?> nhóm người sử dụng</div>
    <?php if( $errors->count() > 0 ): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p  class="alert alert-danger"><?php echo e($message); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php echo Form::open(array('route' => 'group-update', 'class' => 'form', 'files'=>'true')); ?>

    <input type="hidden" value="<?php echo e($id); ?>" name="id">
    <div class="form-group form-inline">
        <label>Tên nhóm:</label>
        <input required name="description" type="text" class="form-control" style="width: 300px" placeholder="Tên nhóm người sử dụng" value="<?php echo e(($id > 0)?$data[0]->description:''); ?>">
    </div>
    <div class="form-group">
        <?php echo Form::submit('Hoàn tất',
          array('class'=>'btn btn-my')); ?>

    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>