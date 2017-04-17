<?php $__env->startSection('page-title'); ?>
    Loại nguồn chỉ đạo
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-center title">Loại nguồn chỉ đạo</div>
    <?php if(\App\Roles::accessAction(Request::path(), 'add')): ?>
        <?php echo e(Html::linkAction('TypeSourceController@edit', 'Thêm loại nguồn chỉ đạo', array('id'=>0), array('class' => 'btn btn-my'))); ?>

    <?php endif; ?>

    <?php echo Form::open(array('route' => 'type-delete', 'class' => 'form', 'id' => 'frmdelete')); ?>

    <?php echo e(Form::hidden('id', 0, array('id' => 'id'))); ?>

    <?php echo Form::close(); ?>

    <script language="javascript">
        function removebyid(id) {

            if (confirm("Bạn có muốn xóa?")) {
                document.getElementById("id").value = id;
                frmdelete.submit();
            }


        }
    </script>

    <table id="table" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th></th>
            <th> Loại nguồn</th>
            <th class="action"></th>
            <th class="action"></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($idx + 1); ?></td>
                <td> <?php echo e($row->name); ?> </td>
                <td>
                    <a href="<?php echo e($_ENV['ALIAS']); ?>/type/update?id=<?php echo e($row->id); ?>"><img height="16" border="0"
                                                                                      src="<?php echo e($_ENV['ALIAS']); ?>/img/edit.png"></a>
                </td>
                <td>
                    <a href="javascript:removebyid('<?php echo e($row->id); ?>')"><img height="16" border="0"
                                                                         src="<?php echo e($_ENV['ALIAS']); ?>/img/delete.png"></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>