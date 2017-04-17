<?php $__env->startSection('page-title'); ?>
    Update User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-center title">Cập nhật thông tin Người sử dụng</div>

    <?php if( $errors->count() > 0 ): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p  class="alert alert-danger"><?php echo e($message); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php $__currentLoopData = $nguoidung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo Form::open(array('route' => 'user-update', 'class' => 'form')); ?>

    <?php echo e(Form::hidden('id', $row->id, array('id' => 'nguoidung_id'))); ?>

    <div class="form-group">
        <label>Tên đăng nhập: <span class="required">(*)</span></label>
        <?php echo Form::text('username', $row->username,
            array('readonly',
                  'class'=>'form-control',
                  'placeholder'=>'Tên đăng nhập')); ?>

    </div>



    <div class="form-group">
        <label>Mật khẩu: <span class="required">(*)</span></label>
        <?php echo Form::password('password',
            array(
                  'class'=>'form-control',
                  'placeholder'=>'Mật khẩu ít nhất 6 ký tự.')); ?>

        <em>* Để trống nếu không thay đổi.</em>
    </div>



    <div class="form-group">
        <label>Họ & tên: <span class="required">(*)</span></label>
        <?php echo Form::text('fullname', $row->fullname,
            array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Nhập tên')); ?>

    </div>

    <div class="form-group">
        <label>Quyền hạn:</label>
        <?php echo Form::select('group', $group, $row->group,
                array('no-required','class'=>'form-control')
        ); ?>

    </div>

    <div class="form-group">
        <label>Đơn vị:</label>
        <?php echo Form::select('unit', $unit, $row->unit,
                array('no-required','class'=>'form-control')
        ); ?>

    </div>


    <div class="form-group">
        <?php echo Form::submit('Cập nhật',
          array('class'=>'btn btn-primary')); ?>

    </div>
    <?php echo Form::close(); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>