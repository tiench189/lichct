<?php $__env->startSection('page-title'); ?>
    Cập nhật quyền
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="text-center title">Cập nhật quyền</div>
    <h4 class="text-left">
        Nhóm: <?php echo e($group->description); ?>

    </h4>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo Session::get('message'); ?></div>
    <?php endif; ?>
    <?php echo Form::open(array('route' => 'group-permission', 'class' => 'form', 'files'=>'true')); ?>

    <input type="hidden" value="<?php echo e($id); ?>" name="id">
    <div class="divider"></div>
    <?php $__currentLoopData = $dataview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group">
            <input type="checkbox" name="view[]" value="<?php echo e($v->id); ?>" id="view-<?php echo e($v->id); ?>" <?php echo e((isset($permission[$v->id]))?'checked':''); ?>>
            <label for="view-<?php echo e($v->id); ?>"><?php echo e($v->name); ?></label>
            <div class="ml form-group form-inline" style="display: <?php echo e((isset($permission[$v->id]))?'block':'none'); ?>" id="group-<?php echo e($v->id); ?>">
                <?php $action = (explode(")", $v->action));?>
                <?php $__currentLoopData = $action; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($a != ""): ?>
                        <?php $a = str_replace('(', '', $a);?>
                        <input type="checkbox" value="<?php echo e($a); ?>" name="action-<?php echo e($v->id); ?>[]" id="<?php echo e($a); ?>-<?php echo e($v->id); ?>" <?php echo e((isset($permission[$v->id]) && strpos($permission[$v->id]->action, $a) !== false)?'checked':''); ?>> <?php echo e($dictionary[$a]); ?> &nbsp;&nbsp;&nbsp;
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <br>
                <?php if($v->only_auth == 1): ?>
                    <input type="checkbox" name="only-auth-<?php echo e($v->id); ?>" <?php echo e((isset($permission[$v->id]) && $permission[$v->id]->only_auth == 0)?'checked':''); ?>> Truy cập tất cả dữ liệu
                <?php endif; ?>
            </div>
        </div>
        <div class="divider"></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="form-group">
        <?php echo Form::submit('Hoàn tất',
          array('class'=>'btn btn-my')); ?>

    </div>
    <?php echo Form::close(); ?>


    <script>
        <?php $__currentLoopData = $dataview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            $('#view-<?php echo e($v->id); ?>').change(function() {
            if(this.checked) {
                $("#group-<?php echo e($v->id); ?>").show();
            }else{
                $("#group-<?php echo e($v->id); ?>").hide();
            }
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
    <style>
        label {
            width: auto !important;
        }

        .ml{
            margin-left: 20px;
        }

        .divider{
            width: 100%;
            height: 1px;
            background-color: #ccc;
            margin-bottom: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>