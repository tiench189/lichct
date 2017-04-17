<?php $__env->startSection('page-title'); ?>
    Người Dùng
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="text-center title">Người sử dụng</div>
<?php if(\App\Roles::checkPermission()): ?>
<?php echo e(Html::linkAction('UserController@edit', 'Thêm người sử dụng', array('id'=>0), array('class' => 'btn btn-my'))); ?>


<?php echo Form::open(array('route' => 'user-delete', 'class' => 'form', 'id' => 'frmxoanguoidung')); ?>

<?php echo e(Form::hidden('id', 0, array('id' => 'nguoidung_id'))); ?>

<?php echo Form::close(); ?>


<script language="javascript">
    function xoanguoidung(id) {

        if(confirm("Bạn có muốn xóa?")) {
            document.getElementById("nguoidung_id").value = id;
            frmxoanguoidung.submit();
        }


    }
</script>
<?php endif; ?>

    <?php if(Session::has('message')): ?>
        <div class="alert alert-info"><?php echo Session::get('message'); ?></div>
    <?php endif; ?>

<table id="table" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th> Username <br />
            <input type="text" style="max-width: 150px">
        </th>
        <th> Tên đầy đủ<br />
            <input type="text" style="max-width: 150px">
        </th>
        <th> Quyền Hạn<br />
            <input type="text" style="max-width: 150px"> </th>
        <th> Đơn vị<br />
            <input type="text" style="max-width: 150px"> </th>

        <?php if(\App\Roles::checkPermission()): ?>
            <th>  </th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $nguoidung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td> <?php echo e($row->username); ?> </td>
        <td> <?php echo e($row->fullname); ?> </td>
        <td>
            <?php if(isset($group[$row->group])): ?>
            <?php echo e($group[$row->group]); ?>

            <?php endif; ?>
        </td>
        <td>
            <?php if(isset($unit[$row->unit])): ?>
            <?php echo e($unit[$row->unit]); ?>

            <?php endif; ?>
        </td>
        <?php if(\App\Roles::checkPermission()): ?>
            <td>
                <a href="<?php echo e($app['url']->to('/')); ?>/user/update?id=<?php echo e($row->id); ?>"><img height="16" border="0" src="<?php echo e($app['url']->to('/img/edit.png')); ?>"></a>
                <a href="javascript:xoanguoidung('<?php echo e($row->id); ?>')"><img height="16" border="0" src="<?php echo e($app['url']->to('/img/delete.png')); ?>"></a>
            </td>
        <?php endif; ?>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
    <script>
        $(document).ready(function () {
            // DataTable
            var table = $('#table').DataTable({
                dom: 'Bfrtip',
                bSort: false,
                bLengthChange: false,
                "pageLength": 20,
                "language": {
                    "url": "<?php echo e($_ENV['ALIAS']); ?>/js/datatables/Vietnamese.json"
                }
            });

            // Apply the search
            table.columns().every(function () {
                var that = this;
                $('input', this.header()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
                $('select', this.header()).on('change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value ? '^' + this.value + '$' : '', true, false).draw();
                    }
                });
            });


        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>