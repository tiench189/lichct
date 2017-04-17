<?php $__env->startSection('page-title'); ?>
    Thêm mới nhiệm vụ
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-toolbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-center title">Thêm nhiệm vụ mới</div>
    <?php if( $errors->count() > 0 ): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="alert alert-danger"><?php echo e($message); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php echo Form::open(array('id' => 'steeringcontent-update', 'route' => 'steeringcontent-update', 'class' => 'form')); ?>

    <div>
        <div class="col-xs-12 col-md-6 bd">
            <div class="form-group ">
                <label>Tên nhiệm vụ: <span class="required">(*)</span></label>
                <?php echo Form::textarea('content', "",
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Nội dung chỉ đạo',
                          'rows'=>'5')); ?>

            </div>
            
            
            
            
            
            
            
            
            
            


            <div class="form-group form-inline">
                <label>LĐ Bộ phụ trách:</label>
                <div class="row">
                    <?php $__currentLoopData = $viphuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xs-12 col-md-3">
                            <?php echo Form::radio('viphuman', $v->id, ($v->name == "") ? true : false); ?> <?php echo $v->name; ?>

                            &nbsp;
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="form-group form-inline">
                <label>Mức độ:</label>
                <div class="row">
                    <?php $__currentLoopData = $priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($p->id != 1): ?>
                            <div class="col-xs-12 col-md-4">
                                <input type="radio" name="priority" class="<?php echo e(($p->id == 1)?'hidden':''); ?>"
                                       value="<?php echo e($p->id); ?>" <?php echo e(($idx == 0)?'checked':''); ?>>
                                <?php echo e($p->name); ?> &nbsp;
                                &nbsp;&nbsp;&nbsp;
                            </div>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="form-group form-inline">
                <label>Đv/Cn chủ trì: <span class="required">(*)</span></label>
                <select id="fList" name="firtunit[]" class="form-control select-multiple ipw"
                        multiple="multiple"
                        required="required">
                    <?php $__currentLoopData = $treeunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="u|<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="h|<?php echo e($u->id); ?>"><?php echo e($u->fullname); ?><?php echo e((isset($dictunit[$u->unit]))? ' - ' . $dictunit[$u->unit]:''); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="btn btn-default ico ico-search" data-toggle="modal" data-target="#firt-unit"></div>
            </div>

            <div class="form-group form-inline">
                <label>Đv/Cn phối hợp:</label>
                <select id="sList" name="secondunit[]" class="form-control select-multiple ipw"
                        multiple="multiple">
                    <?php $__currentLoopData = $treeunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="u|<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="h|<?php echo e($u->id); ?>"><?php echo e($u->fullname); ?><?php echo e((isset($dictunit[$u->unit]))? ' - ' . $dictunit[$u->unit]:''); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="btn btn-default ico ico-search" data-toggle="modal"
                     data-target="#second-unit"></div>
            </div>

            <div class="form-group  form-inline">
                <label>Ngày chỉ đạo: <span class="required">(*)</span></label>
                <?php echo Form::text('steer_time', "",
                    array('required', 'class'=>'form-control datepicker',
                          'placeholder'=>'Ngày chỉ đạo')); ?>

            </div>

            <div class="form-group  form-inline">
                <label>Hạn hoàn thành:</label>
                <?php echo Form::text('deathline', "",
                    array('class'=>'form-control datepicker',
                          'placeholder'=>'Thời gian hoàn thành')); ?>

            </div>
        </div>

        <div class="col-xs-12  col-md-6 bd">
            <div class="form-group form-inline">
                <label>Nguồn chỉ đạo: <span class="required">(*)</span></label>
                <ul class="list-group">
                    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item list-item">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <input type="checkbox" name="mtype[]" class="pick-source " id="type<?php echo e($key); ?>"
                                           value="<?php echo e($key . '|' .$s->id); ?>">
                                    <?php echo e($s->name); ?>

                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <?php echo Form::text('note[]', "", array('class'=>'form-control', 'placeholder'=>'Ký hiệu/Ghi chú', 'date-id'=>"$key")); ?>

                                </div>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="form-group pull-right">
        <?php echo Form::submit('Lưu lại',
          array('class'=>'btn btn-my pull-middle')); ?>

    </div>
    <?php echo Form::close(); ?>


    <div id="modal-source" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Danh sách nguồn chỉ đạo:</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <?php $__currentLoopData = $sourcesteering; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" name="psource" class="pick-source" value="<?php echo e($s->code); ?>"
                                           data-time="<?php echo e(date("d-m-Y", strtotime($s->time))); ?>"></td>
                                <td><?php echo e($s->code); ?></td>
                                <td><?php echo e($s->name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-add-source" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm nguồn chỉ đạo:</h4>
                </div>
                <div class="modal-body">
                    <?php echo Form::open(array('route' => 'sourcesteering-addsource', 'class' => 'form', 'files'=>'true', 'id'=>'form-add-source')); ?>

                    <div class="form-group form-inline">
                        <label>Loại nguồn:</label>
                        <select name="type" class="form-control">
                            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($t->id); ?>"><?php echo e($t->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group form-inline">
                        <label>Số kí hiệu: <span class="required">(*)</span></label>
                        <input id="new-source-code" type="text" required name="code" class="form-control" value="">
                    </div>
                    <div class="form-group form-inline">
                        <label>Trích yếu: <span class="required">(*)</span></label>
                        <textarea name="name" style="width: 100%;" class="form-control" required></textarea>
                    </div>
                    <div class="form-group form-inline">
                        <label>Ngày ban hành: <span class="required">(*)</span></label>
                        <input id="my-time" name="time" type="text" class="form-control datepicker" required value="">
                    </div>
                    <div class="form-group form-inline">
                        <label>Người ký:</label>
                        <input type="text" name="sign_by" class="form-control" value="">
                    </div>
                    <div class="form-group form-inline">
                        <label style="float: left">File đính kèm:</label>
                        <?php echo Form::file('docs', array('class'=>'')); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::submit('Hoàn tất',
                          array('class'=>'btn btn-my')); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    <div id="modal-viphuman" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Danh sách LĐ Bộ pt</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <?php $__currentLoopData = $viphuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="radio" name="pviphuman" class="pick-source" value="<?php echo e($v->id); ?>"
                                           data-name="<?php echo e($v->name); ?>"></td>
                                <td><?php echo e($v->name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="firt-unit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Danh sách đơn vị</h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#fdonvi">Đơn vị</a></li>
                        <li><a data-toggle="tab" href="#fcanhan">Cá nhân</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="panel-group tab-pane fade in active" id="fdonvi">
                            <?php $__currentLoopData = $treeunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx=>$u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <input type="checkbox" name="pfunit-parent" class="pick-firt-unit"
                                                   value="<?php echo e($u->id); ?>">
                                            <a data-toggle="collapse" href="#collapse<?php echo e($u->id); ?>"> <?php echo e($u->name); ?></a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo e($u->id); ?>" class="panel-collapse collapse in">
                                        <ul class="list-group">
                                            <?php $__currentLoopData = $u->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item">
                                                    
                                                    <input type="checkbox" name="pfunit" class="pick-firt-unit"
                                                           value="u|<?php echo e($c->id); ?>" parent-id="<?php echo e($u->id); ?>">
                                                    <?php echo e($c->name); ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div id="fcanhan" class="tab-pane fade in">
                            <ul class="list-group">
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        
                                        <input type="checkbox" name="pfunit" class="pick-firt-unit"
                                               value="h|<?php echo e($u->id); ?>">
                                        <?php echo e($u->fullname); ?><?php echo e((isset($dictunit[$u->unit]))? ' - ' . $dictunit[$u->unit]:''); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="second-unit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Danh sách đơn vị</h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#sdonvi">Đơn vị</a></li>
                        <li><a data-toggle="tab" href="#scanhan">Cá nhân</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="panel-group tab-pane fade in active" id="sdonvi">
                            <?php $__currentLoopData = $treeunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx=>$u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <input type="checkbox" name="psunit-parent" class="pick-firt-unit"
                                                   value="<?php echo e($u->id); ?>">
                                            <a data-toggle="collapse" href="#collapse2<?php echo e($u->id); ?>"> <?php echo e($u->name); ?></a>
                                        </h4>
                                    </div>

                                    <div id="collapse2<?php echo e($u->id); ?>" class="panel-collapse collapse in">
                                        <ul class="list-group">
                                            <?php $__currentLoopData = $u->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item">
                                                    <input type="checkbox" name="psunit" class="pick-firt-unit"
                                                           value="u|<?php echo e($c->id); ?>" parent-id="<?php echo e($u->id); ?>">
                                                    <?php echo e($c->name); ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div id="scanhan" class="tab-pane fade in">
                            <ul class="list-group">
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        
                                        <input type="checkbox" name="psunit" class="pick-firt-unit"
                                               value="h|<?php echo e($u->id); ?>">
                                        <?php echo e($u->fullname); ?><?php echo e((isset($dictunit[$u->unit]))? ' - ' . $dictunit[$u->unit]:''); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e($_ENV['ALIAS']); ?>/js/jquery-ui.js"></script>
    <link href="<?php echo e($_ENV['ALIAS']); ?>/css/jquery-ui.css" rel="stylesheet">
    <script>
        var sources = [
            <?php $__currentLoopData = $sourcesteering; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                '<?php echo e($s->code); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];
        var viphumans = [
            <?php $__currentLoopData = $viphuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                '<?php echo e($v->name); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];
        var unitname = [
            <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                '<?php echo e($u->name); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];
        function split(val) {
            return val.split(/,\s*/);
        }
        function extractLast(term) {
            return split(term).pop();
        }
        function getCurrentDate() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var today = dd + '/' + mm + '/' + yyyy;
            return today;
        }
        function valCheckbox() {
            var checkboxs = document.getElementsByName("mtype[]");
            var okay = false;
            for (var i = 0, l = checkboxs.length; i < l; i++) {
                if (checkboxs[i].checked) {
                    okay = true;
                    break;
                }
            }
            if (okay) {
                return true;
            }
            else {
                alert("Phải chọn ít nhất một nguồn chỉ đạo");
                return false;
            }
        }

        $(document).ready(function () {
//                $('input[name="steer_time"]').val(getCurrentDate());

            $("#source").autocomplete({
                source: sources
            });
            $("#viphuman").autocomplete({
                source: viphumans
            });
        });
        $('input[name="note[]"]').change(function(e){
            var val = $(this).val();
            var id = $(this).attr('date-id');
            if(val != ''){
                $('input:checkbox[id=type'+id+']').attr('checked', true);
            }else{
                $('input:checkbox[id=type'+id+']').attr('checked', false);
            }
        });

        $('input:checkbox[name=psource]').change(function () {
//            $('input[name="source"]').val($('input[name="psource"]:checked').val())
//            var time = $('input[name="psource"]:checked').attr('data-time');
//            $('input[name="steer_time"]').val(time);
            var arr = [];
            $('input:checkbox[name=psource]:checked').each(function () {
                arr.push($(this).val());
            });
            $("#msource").val(arr).trigger('change');
        });

        $('input[name="source"]').change(function () {
            var val = $('input[name="source"]').val();
            $('input:checkbox[name=psource][value="' + val + '"]').attr('checked', true);
        });


        $('input:radio[name=pviphuman]').change(function () {
            var name = $('input[name="pviphuman"]:checked').attr('data-name');
            $('input[name="viphuman"]').val(name);
        });

        $('input[name="viphuman"]').change(function () {
            var val = $('input[name="viphuman"]').val();
            $('input:radio[name=pviphuman][data-name="' + val + '"]').attr('checked', true);
        });


        //        $('input:radio[name=pfunit]').change(function () {
        //            var id = $('input[name="pfunit"]:checked').val();
        //            $("#fList").val(id).trigger('change');
        ////            $('#fList option[value=' + id +']').attr('selected','selected');
        //        });

        $('input:checkbox[name=pfunit]').change(function () {
            var arr = [];
            var vl = '';
            $('input:checkbox[name=pfunit]:checked').each(function () {
                vl = $(this).val();
                arr.push(vl);
            });
            $("#fList").val(arr).trigger('change');
        });
        $('input:checkbox[name=pfunit-parent]').change(function () {
            var id = $(this).val();
            if (!$(this).is(":checked")) {
                $("input:checkbox[name=pfunit][parent-id=" + id + "]").prop('checked', false);
            } else {
                $("input:checkbox[name=pfunit][parent-id=" + id + "]").prop('checked', true);
            }
            var arr = [];
            var vl = '';
            $('input:checkbox[name=pfunit]:checked').each(function () {
                vl = $(this).val();
                arr.push(vl);
            });
            $("#fList").val(arr).trigger('change');
        });


        $('input:checkbox[name=psunit]').change(function () {
            var arr = [];
            var vl = '';
            $('input:checkbox[name=psunit]:checked').each(function () {
                vl = $(this).val();
                arr.push(vl);
            });
            $("#sList").val(arr).trigger('change');
        });

        $('input:checkbox[name=psunit-parent]').change(function () {
            var id = $(this).val();
            if (!$(this).is(":checked")) {
                alert('t');
                $("input:checkbox[name=psunit][parent-id=" + id + "]").prop('checked', false);
            } else {
                $("input:checkbox[name=psunit][parent-id=" + id + "]").prop('checked', true);
            }
            var arr = [];
            var vl = '';
            $('input:checkbox[name=psunit]:checked').each(function () {
                vl = $(this).val();
                arr.push(vl);
            });
            $("#sList").val(arr).trigger('change');
        });

        //        $('#fList').change(function() {
        //            var val = $("#fList option:selected").val();
        //            $("input:radio[name=pfunit][value=" + val + "]").attr('checked', true);
        //        });

        $('#fList').on("select2:select", function (event) {
            $(event.currentTarget).find("option:selected").each(function (i, selected) {
                i = $(selected).val();
                $('input:checkbox[name=pfunit][value="' + i + '"]').attr('checked', true);
            });
        });
        $("#fList").on("select2:unselect", function (event) {
            $('input:checkbox[name=pfunit]').prop('checked', false);

            $(event.currentTarget).find("option:selected").each(function (i, selected) {
                i = $(selected).val();
                $('input:checkbox[name=pfunit][value="' + i + '"]').prop('checked', true);
            });
        });

        $('#sList').on("select2:select", function (event) {
            $(event.currentTarget).find("option:selected").each(function (i, selected) {
                i = $(selected).val();
                $('input:checkbox[name=psunit][value="' + i + '"]').attr('checked', true);
            });
        });

        $("#sList").on("select2:unselect", function (event) {
            $('input:checkbox[name=psunit]').prop('checked', false);
            $(event.currentTarget).find("option:selected").each(function (i, selected) {
                i = $(selected).val();
                $('input:checkbox[name=psunit][value="' + i + '"]').prop('checked', true);
            });
        });

        $(".select-multiple").select2({
            tags: true
        });
        $(".select-single").select2();

        $("#steeringcontent-update").submit(function (e) {
            var check = valCheckbox();
            if (check == false) {
                return false;
            }
        })

        $("#form-add-source").submit(function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            var code = $("#new-source-code").val();

            $(".loader").show();
            var url = $(this).attr("action");
            console.log(url);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                async: false,
                success: function (result) {
                    console.log(result);
                    $(".loader").hide();
                    if (result.result) {
                        $("#modal-add-source").modal("hide");
                        $('#msource')
                            .append("<option value='" + code + "' selected>" + code + "</option>");
                    } else {
                        alert(result.mess);
                    }
                },
                error: function () {
                    $(".loader").hide();
                    alert("Xảy ra lỗi nội bộ");
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
    <style>
        .ipw {
            width: 300px !important;
        }

        .select2 {
            width: 290px !important;
        }
        .bd{
        }
        @media  screen and (max-width: 600px) {
            .select2 {
                width: 270px !important;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>