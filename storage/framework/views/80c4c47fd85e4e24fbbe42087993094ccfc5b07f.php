<?php $__env->startSection('page-title'); ?>
    Trang yêu cầu không tồn tại!
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h2>Trang yêu cầu không tồn tại!</h2>
<h4><?php echo e($exception->getMessage()); ?></h4>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>