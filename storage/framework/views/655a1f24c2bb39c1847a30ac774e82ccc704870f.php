<?php $__env->startSection('page-title'); ?>
    Nhóm người sử dụng
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-center title">Nhóm Người sử dụng</div>
    <?php if(\App\Roles::accessAction($role, 'add')): ?>
        <?php echo e(Html::linkAction('GroupController@edit', 'Thêm nhóm Người sử dụng', array('id'=>0), array('class' => 'btn btn-my'))); ?>

    <?php endif; ?>

    <?php echo Form::open(array('route' => 'group-delete', 'class' => 'form', 'id' => 'frmdelete')); ?>

    <?php echo e(Form::hidden('id', 0, array('id' => 'id'))); ?>

    <?php echo Form::close(); ?>

    <script language="javascript">
        function removebyid(id) {

            if (confirm("Bạn có muốn xóa nhóm này?")) {
                document.getElementById("id").value = id;
                frmdelete.submit();
            }


        }
    </script>

    <?php if(Session::has('message')): ?>
        <div class="alert alert-info"><?php echo Session::get('message'); ?></div>
    <?php endif; ?>

    <table id="table" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="action"></th>
            <th> Tên nhóm</th>
            <th class="action"></th>
            <th class="action"></th>
            <th class="action"></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('gid') && Session::get('gid') == $row->id): ?>
            <tr class="info">
            <?php else: ?>
            <tr>
            <?php endif; ?>
                <td><?php echo e($idx + 1); ?></td>
                <td> <?php echo e($row->description); ?> </td>
                <td>
                    <a href="<?php echo e($_ENV['ALIAS']); ?>/group/update?id=<?php echo e($row->id); ?>" title="Chỉnh sửa"><img height="16" border="0"
                                                                                  src="<?php echo e($_ENV['ALIAS']); ?>/img/edit.png"></a>
                </td>
                <td>
                    <a href="<?php echo e($_ENV['ALIAS']); ?>/group/permission?id=<?php echo e($row->id); ?>" title="Cập nhật quyền"><img height="16" border="0"
                                                                                   src="<?php echo e($_ENV['ALIAS']); ?>/img/ico-role.ico"></a>
                </td>
                <td>
                    <a href="javascript:removebyid('<?php echo e($row->id); ?>')" title="Xóa"><img height="16" border="0"
                                                                         src="<?php echo e($_ENV['ALIAS']); ?>/img/delete.png"></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>