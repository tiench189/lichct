<?php $__env->startSection('page-title'); ?>
    Người Dùng
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-center title">Ban / Đơn vị</div>
<?php if(\App\Roles::checkPermission()): ?>
<?php echo e(Html::linkAction('UnitController@edit', 'Thêm đơn vị', array('id'=>0), array('class' => 'btn btn-my'))); ?>


<?php echo Form::open(array('route' => 'unit-delete', 'class' => 'form', 'id' => 'frmdelete')); ?>

<?php echo e(Form::hidden('id', 0, array('id' => 'id'))); ?>

<?php echo Form::close(); ?>

<script language="javascript">
    function removebyid(id) {

        if(confirm("Bạn có muốn xóa?")) {
            document.getElementById("id").value = id;
            frmdelete.submit();
        }


    }
</script>
    <?php endif; ?>

    <?php if(Session::has('message')): ?>
        <div class="alert alert-info"><?php echo Session::get('message'); ?></div>
    <?php endif; ?>

        <ul class="nav nav-tabs">
            <?php $__currentLoopData = $treeunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx=>$u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e(($idx == 0)?'active':''); ?>"><a data-toggle="tab" href="#first-<?php echo e($u->id); ?>"><?php echo e($u->name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content">
            <?php $__currentLoopData = $treeunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx=>$u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="first-<?php echo e($u->id); ?>" class="tab-pane fade in <?php echo e(($idx == 0)?'active':''); ?>">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tên Ban - Đơn vị</th>
                            <th>Tên viết tắt</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php $__currentLoopData = $u->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($c->name); ?></td>
                                <td><?php echo e($c->shortname); ?></td>
                                <td><a href="<?php echo e($_ENV['ALIAS']); ?>/unit/update?id=<?php echo e($c->id); ?>">
                                        <img height="20" border="0" src="<?php echo e($_ENV['ALIAS']); ?>/img/edit.png"></a>
                                </td>
                                <td>
                                    <a href="javascript:removebyid('<?php echo e($c->id); ?>')">
                                        <img height="20" border="0" src="<?php echo e($_ENV['ALIAS']); ?>/img/delete.png"></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>