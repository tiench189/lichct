<?php $__env->startSection('page-title'); ?>
    Người Dùng
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(\App\Roles::checkPermission()): ?>
    <script language="javascript">
        function removebyid(id) {

            if(confirm("Bạn có muốn xóa?")) {
                document.getElementById("nguoidung_id").value = id;
                frmdelete.submit();
            }
        }
    </script>
    <div class="text-center title">LĐ Bộ pt</div>
    <?php echo e(Html::linkAction('ViphumanController@edit', 'Thêm LĐ Bộ pt', array('id'=>0), array('class' => 'btn btn-my'))); ?>


    <?php echo Form::open(array('route' => 'viphuman-delete', 'class' => 'form', 'id' => 'frmdelete')); ?>

        <?php echo e(Form::hidden('id', 0, array('id' => 'nguoidung_id'))); ?>

        <?php echo Form::close(); ?>

    <?php endif; ?>

    <table id="table" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> Tên lãnh đạo <br />
                <input type="text" style="max-width: 150px"></th>
            <th> Chức vụ <br />
                <input type="text" style="max-width: 150px"></th>
            <?php if(\App\Roles::checkPermission()): ?>
                <th>  </th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $nguoidung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td> <?php echo e($row->name); ?> </td>
                <td> <?php echo e($row->description); ?> </td>
                <?php if(\App\Roles::checkPermission()): ?>
                    <td>
                        <a href="<?php echo e($_ENV['ALIAS']); ?>/viphuman/update?id=<?php echo e($row->id); ?>"><img height="16" border="0" src="<?php echo e($_ENV['ALIAS']); ?>/img/edit.png"></a>
                        <a href="javascript:removebyid('<?php echo e($row->id); ?>')"><img height="16" border="0" src="<?php echo e($_ENV['ALIAS']); ?>/img/delete.png"></a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>