<?php $__env->startSection('page-title'); ?>
    Báo cáo
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-toolbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div class="text-center title">Báo cáo thống kê đơn vị</div>
        <a class="btn btn-my pull-right hidden-xs hidden-sm" style="margin-top: -50px;" href="javascript:clearFilter()">Xóa
            tìm kiếm</a>
        <a class="btn btn-my pull-right visible-xs visible-sm" style="margin-top: -50px;"
           href="javascript:clearFilter()">Xóa</a>
    </div>


    <?php if( $errors->count() > 0 ): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="alert alert-danger"><?php echo e($message); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php echo Form::open(array('route' => 'report-index', 'class' => 'form', 'id' => 'form')); ?>



    <div class="row search-box">
        <div class="col-md-6 col-sm-12">
            <div class="form-group form-inline ">
                <label>Nguồn chỉ đạo:</label>
                <div class="input-contain form-group form-inline">
                    <?php echo Form::text('source', "",
                            array('no-required',
                            'placeholder'=>'Nguồn chỉ đạo',
                            'class'=>'form-control ipw mi fl', 'id'=>'source')
                    ); ?>

                    <div class="btn btn-default ico ico-search fl" data-toggle="modal"
                         data-target="#modal-source"></div>
                </div>
            </div>
            <div class="form-group form-inline">
                <label>LĐ Bộ pt:</label>
                <div class="input-contain">
                    <?php echo Form::text('conductor', "",
                            array('no-required',
                            'placeholder'=>'LĐ Bộ pt',
                            'class'=>'form-control ipw mi fl', 'id'=>'viphuman')
                    ); ?>

                    <div class="btn btn-default ico ico-search fl" data-toggle="modal"
                         data-target="#modal-viphuman"></div>
                </div>
            </div>
            <div class="form-group form-inline">
                <label>Đơn vị/Cá nhân đầu mối:</label>
                <select id="fList" name="firtunit[]" class="form-control select-single ipw" style="max-width:80%;">
                    <option value="">...</option>
                    <?php $__currentLoopData = $treeunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c->name); ?>"><?php echo e($c->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($u->fullname); ?>"><?php echo e($u->fullname); ?><?php echo e((isset($dictunit[$u->unit]))? ' - ' . $dictunit[$u->unit]:''); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="btn btn-default ico ico-search" data-toggle="modal" data-target="#firt-unit"></div>
            </div>
            <div class="form-group form-inline">
                <label>Đơn vị/Cá nhân phối hợp:</label>
                <select id="sList" name="secondunit[]" class="form-control select-single ipw" style="max-width:80%;">
                    <option value="">...</option>
                    <?php $__currentLoopData = $treeunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c->name); ?>"><?php echo e($c->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($u->fullname); ?>"><?php echo e($u->fullname); ?><?php echo e((isset($dictunit[$u->unit]))? ' - ' . $dictunit[$u->unit]:''); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="btn btn-default ico ico-search" data-toggle="modal" data-target="#second-unit"></div>
            </div>

        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group form-inline">
                <label>Ngày chỉ đạo:</label>
                <div class="input-contain">
                    <?php echo Form::text('steertime_from', "",
                        array('class'=>'form-control datepicker fl', 'id'=>'steertime_from',
                              'placeholder'=>'Từ ngày')); ?>

                    <?php echo Form::text('steertime_to', "",
                        array('class'=>'form-control datepicker fl ml10','id'=>'steertime_to',
                              'placeholder'=>'Đến ngày')); ?>

                </div>
            </div>
            <div class="form-group  form-inline">
                <label>Thời hạn hoàn thành:</label>
                <div class="input-contain">
                    <?php echo Form::text('deadline_from', "",
                            array('class'=>'form-control datepicker fl',
                                  'placeholder'=>'Từ ngày','id'=>'deadline_from'
                                  )); ?>

                    <?php echo Form::text('deadline_to', "",
                            array('class'=>'form-control datepicker fl ml10','id'=>'deadline_to',
                                  'placeholder'=>'Đến ngày')); ?>

                </div>
            </div>
            <div class="form-group form-inline">
                <label>Tiến độ:</label>
                <select id="progress" name="progress" class="form-control mi ipw">
                    <option value="">Toàn bộ</option>
                    <option value="2">Đã hoàn thành(Đúng hạn)</option>
                    <option value="3">Đã hoàn thành(Quá hạn)</option>
                    <option value="1">Đang thực hiện(Trong hạn)</option>
                    <option value="4">Đang thực hiện(Quá hạn)</option>
                    <option value="5">Nhiệm vụ sắp hết hạn</option>
                    <option value="6">Nhiệm vụ đã bị hủy</option>
                </select>
            </div>
            <div class="form-group form-inline pull-right" style="margin-bottom: 0px">
                <?php echo Form::submit('Tìm kiếm',
                  array('class'=>'btn btn-my', 'id'=>'search')); ?>

                <a class="btn btn-my" href="javascript:exportUnit()">Xuất báo cáo</a>
            </div>
        </div>

    </div>


    <?php echo Form::close(); ?>

    <div class="row note-contain">
        <div class="col-xs-12 col-md-4">
            <div class="note-cl cl2"></div>
            <a id="a2" class="a-status" href="javascript:filterStatus(2)"><span class="note-tx">Đã hoàn thành</span>(Đúng
                hạn, <span class="count-st" id="row-st-2"></span>)</a><br>
            <div class="note-cl cl3"></div>
            <a id="a3" class="a-status" href="javascript:filterStatus(3)"><span class="note-tx">Đã hoàn thành</span>(Quá
                hạn, <span class="count-st" id="row-st-3"></span>)</a>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="note-cl cl1"></div>
            <a id="a1" class="a-status" href="javascript:filterStatus(1)"><span class="note-tx">Đang thực hiện</span>(Trong
                hạn, <span class="count-st" id="row-st-1"></span>)</a><br>
            <div class="note-cl cl4"></div>
            <a id="a4" class="a-status" href="javascript:filterStatus(4)"><span class="note-tx">Đang thực hiện</span>(Quá
                hạn, <span class="count-st" id="row-st-4"></span>)</a>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="note-cl cl5"></div>
            <a id="a5" class="a-status" href="javascript:filterStatus(5)"><span class="note-tx">Nhiệm vụ sắp hết hạn(7 ngày)</span>
                (<span class="count-st" id="row-st-5"></span>)</a><br>
            <div class="note-cl cl6"></div>
            <a id="a6" class="a-status" href="javascript:filterStatus(6)"><span
                        class="note-tx">Nhiệm vụ đã bị hủy</span> (<span class="count-st" id="row-st-6"></span>)</a>
        </div>
    </div>
    <div>
        <div class="pull-right">
        <span><a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="table"
                 href="javascript:exportExcel()"><span class="hidden-xs hidden-sm">Xuất ra </span>Excel</a></span>
            <span><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="table"
                     href="javascript:exportExcel(null,null,'pdf')"><span class="hidden-xs hidden-sm">Xuất ra </span>PDF</a></span>
        </div>
    </div>
    <div class="total-nv">(<span class="hidden-xs hidden-sm">Tổng số: </span><?php echo e(count($lst)); ?> nhiệm vụ)</div>
    <table id="table" class="table table-bordered table-hover row-border hover order-column">
        <thead>
        <tr>
            <th class="hidden"></th>
            <th style="width: 10px"></th>
            <th style="min-width: 150px"> Tên nhiệm vụ<br><input type="text"></th>
            <th style="width: 55px">LĐ Bộ pt<br>
                <select style="width: 55px">
                    <option value=""></option>
                    <?php $__currentLoopData = $viphuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($row->name); ?>"><?php echo e($row->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </th>
            <th style="min-width: 100px"> Ngày chỉ đạo<br><input type="text" id="id_steertime"></th>
            <th style="min-width: 100px"> Nguồn chỉ đạo<br><input id="id_source" type="text"></th>
            <th style="min-width: 100px"> Đv/cn đầu mối<input id="id_funit" type="text"></th>
            <th style="min-width: 100px"> Đv/Cn phối hợp<br><input id="id_sunit" type="text"></th>
            <th style="min-width: 50px">Hạn HT<br><input id="id_complete_time" type="text" class="datepicker">
            </th>
            <th class="hidden">Trạng thái</th>
            <th class="hidden"><input type="text" id="filter-status"></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $lst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php
            $st = 1;
            if ($row->status == 1) {
                if ($row->deadline == "" || $row->complete_time < $row->deadline) {
                    $st = 2;
                } else {
                    $st = 3;
                }
            } else if ($row->status == -1) {
                $st = 6;
            } else if ($row->deadline == "") {
                $st = 1;
            } else {
                if (date('Y-m-d') > $row->deadline) {
                    $st = 4;
                } else if (date('Y-m-d', strtotime("+7 day")) > $row->deadline) {
                    $st = 5;
                } else {
                    $st = 1;
                }
            }
            $name_stt = array();
            $name_stt[1] = "Đang thực hiện (trong hạn)";
            $name_stt[2] = "Đã hoàn thành (đúng hạn)";
            $name_stt[3] = "Đã hoàn thành (quá hạn)";
            $name_stt[4] = "Đang thực hiện (quá hạn)";
            $name_stt[5] = "Sắp hết hạn (7 ngày)";
            $name_stt[6] = "Bị hủy";
            ?>

            <tr class="row-export row-st-<?php echo e($st); ?>" id="row-<?php echo e($row->id); ?>" deadline="<?php echo e($row->deadline); ?>">
                <td class="hidden id-export"><?php echo e($row->id); ?></td>
                <td><?php echo e($idx + 1); ?></td>
                <td title="Xem thông tin chi tiết nhiệm vụ" class="click-detail" onclick="showDetail(<?php echo e($row->id); ?>)"> <?php echo e($row->content); ?> </td>
                <td class="text-center"><?php echo e(isset($conductor[$row->conductor])?$conductor[$row->conductor]:$row->conductor); ?></td>
                <td> <?php echo e(($row->steer_time != '')?Carbon\Carbon::parse($row->steer_time)->format('d/m/y'):''); ?> </td>
                <td>
                    
                        
                            
                                
                            
                        
                    
                    <?php if( !empty($steeringSourceArr[$row->id])): ?>
                        <?php $__currentLoopData = $steeringSourceArr[$row->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="unit-list">
                                <li> <?php echo e($item['source']); ?></li>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </td>

                <td onclick="javascript:showunit(<?php echo e($idx); ?>)" class="unit-st-<?php echo e($st); ?>">
                    <ul class="unit-list" id="unit-list<?php echo e($idx); ?>">
                        <?php ($n = 0); ?>
                        <?php $__currentLoopData = $units = explode(',', $row->unit); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $spl = explode('|', $i);
                            $validate = false;
                            $val = "";
                            if ($spl[0] == 'u' && isset($unit[$spl[1]])) {
                                $validate = true;
                                $val = $unit[$spl[1]];
                                $n++;
                            } else if ($spl[0] == 'h' && isset($user[$spl[1]])) {
                                $validate = true;
                                $val = $user[$spl[1]];
                                $n++;
                            }
                            ?>
                            <?php if($validate): ?>
                                <?php if($loop->iteration < 3): ?>
                                    <li> • <?php echo e($val); ?></li>
                                <?php else: ?>
                                    <li class="more"> • <?php echo e($val); ?></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($n > 2): ?>
                            <li class="more-link" hide="1"><a name="more-link-<?php echo e($idx); ?>">[+] Xem thêm</a></li>
                        <?php endif; ?>
                    </ul>
                </td>
                <td onclick="javascript:showfollow(<?php echo e($idx); ?>)">
                    <ul class="unit-list" id="follow-list<?php echo e($idx); ?>">
                        <?php ($n = 0); ?>
                        <?php $__currentLoopData = $units = explode(',', $row->follow); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $spl = explode('|', $i);
                            $validate = false;
                            $val = "";
                            if ($spl[0] == 'u' && isset($unit[$spl[1]])) {
                                $validate = true;
                                $val = $unit[$spl[1]];
                                $n++;
                            } else if ($spl[0] == 'h' && isset($user[$spl[1]])) {
                                $validate = true;
                                $val = $user[$spl[1]];
                                $n++;
                            }
                            ?>
                            <?php if($validate): ?>
                                <?php if($loop->iteration < 3): ?>
                                    <li> • <?php echo e($val); ?></li>
                                <?php else: ?>
                                    <li class="more"> • <?php echo e($val); ?></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($n > 2): ?>
                            <li class="more-link" hide="1"><a name="more-link-<?php echo e($idx); ?>">[+] Xem thêm</a></li>
                        <?php endif; ?>
                    </ul>
                </td>
                <td> <?php echo e(($row->deadline != '')?Carbon\Carbon::parse($row->deadline)->format('d/m/y'):''); ?></td>
                <td class="hidden"><?php echo e($name_stt[$st]); ?></td>
                <td class="hidden"><?php echo e($st); ?></td>
            </tr>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div>
        <span><a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="table" href="javascript:exportExcel('unit', 'ASC')"><span>Xuất ra Excel</span></a></span>
        <span><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="table"
                 href="javascript:exportExcel('unit', 'ASC' ,'pdf')"><span>Xuất ra PDF</span></a></span>
    </div>
    <div id="modal-source" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Danh sách nguồn chỉ đạo:</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        
                            
                                
                                           
                                
                                
                            
                        
                        <?php $__currentLoopData = $typeArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="radio" name="psource" class="pick-source" value="<?php echo e($type); ?>"></td>
                                <td><?php echo e($type); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
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
                    <h4 class="modal-title text-center">Danh sách đơn vị/Cá nhân</h4>
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
                                            <a data-toggle="collapse" href="#collapse<?php echo e($u->id); ?>"> <?php echo e($u->name); ?></a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo e($u->id); ?>" class="panel-collapse collapse in">
                                        <ul class="list-group">
                                            <?php $__currentLoopData = $u->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item">
                                                    
                                                    <input type="radio" name="pfunit" class="pick-firt-unit"
                                                           value="<?php echo e($c->name); ?>" parent-id="<?php echo e($u->id); ?>">
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
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        
                                        <input type="radio" name="pfunit" class="pick-firt-unit"
                                               value="<?php echo e($u->fullname); ?>">
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
                    <h4 class="modal-title">Danh sách đơn vị/Cá nhân</h4>
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
                                            <a data-toggle="collapse" href="#collapse2<?php echo e($u->id); ?>"> <?php echo e($u->name); ?></a>
                                        </h4>
                                    </div>

                                    <div id="collapse2<?php echo e($u->id); ?>" class="panel-collapse collapse in">
                                        <ul class="list-group">
                                            <?php $__currentLoopData = $u->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item">
                                                    <input type="radio" name="psunit" class="pick-firt-unit"
                                                           value="<?php echo e($c->name); ?>" parent-id="<?php echo e($u->id); ?>">
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
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        
                                        <input type="radio" name="psunit" class="pick-firt-unit"
                                               value="<?php echo e($u->fullname); ?>">
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
        var current_date = "<?php echo e(date('d/m/y')); ?>";
        var sources = [
            <?php $__currentLoopData = $typeArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    '<?php echo e($type); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];
        var viphumans = [
            <?php $__currentLoopData = $viphuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    '<?php echo e($v->name); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];
        function showunit(unit) {
            if ($("#unit-list" + unit + " .more-link").attr("hide") == 1) {
                $("#unit-list" + unit + " .more").show();
                $("#unit-list" + unit + " .more-link a").text("[-] Thu gọn");
                $("#unit-list" + unit + " .more-link").attr("hide", 0);
            } else {
                $("#unit-list" + unit + " .more").hide();
                $("#unit-list" + unit + " .more-link a").text("[+] Xem thêm");
                $("#unit-list" + unit + " .more-link").attr("hide", 1);
            }

        }
        function showfollow(unit) {

            if ($("#follow-list" + unit + " .more-link").attr("hide") == 1) {
                $("#follow-list" + unit + " .more").show();
                $("#follow-list" + unit + " .more-link a").text("[-] Thu gọn");
                $("#follow-list" + unit + " .more-link").attr("hide", 0);
            } else {
                $("#follow-list" + unit + " .more").hide();
                $("#follow-list" + unit + " .more-link a").text("[+] Xem thêm");
                $("#follow-list" + unit + " .more-link").attr("hide", 1);
            }

        }
        function dateToTime(strDate) {
            var split = strDate.split('/');
            var time = new Date(split[2], split[1] - 1, split[0]);
            return time;
        }

        $(document).ready(function () {
            reCount();
            $("#source").autocomplete({
                source: sources
            });
            $("#viphuman").autocomplete({
                source: viphumans
            });

            $('input:radio[name=psource]').change(function () {
                var name = $('input[name="psource"]:checked').val()
                $('input[name="source"]').val(name);
            });

            $('input[name="source"]').change(function () {
                var val = $('input[name="source"]').val();
                $('input:radio[name=psource][value="' + val + '"]').attr('checked', true);
            });

            $('input:radio[name=pviphuman]').change(function () {
                var name = $('input[name="pviphuman"]:checked').attr('data-name');
                $('input[name="conductor"]').val(name);
            });
            $('input[name="conductor"]').change(function () {
                var val = $('input[name="conductor"]').val();
                $('input:radio[name=pviphuman][data-name="' + val + '"]').attr('checked', true);
            });
            //
            $('input:radio[name=pfunit]').change(function () {
                console.log("change");
                var name = $('input:radio[name=pfunit]:checked').val();
                $('#fList').val(name).change();
            });
            $('#fList').change(function () {
                var val = $('#fList').val();
                $('input:radio[name=pfunit][value="' + val + '"]').attr('checked', true);
            });

            $('input:radio[name=psunit]').change(function () {
                console.log("change");
                var name = $('input:radio[name=psunit]:checked').val();
                $('#sList').val(name).change();
            });
            $('#sList').change(function () {
                var val = $('#sList').val();
                $('input:radio[name=psunit][value="' + val + '"]').attr('checked', true);
            });

            // DataTable
            var table = $('#table').DataTable({
                bSort: false,
                bLengthChange: false,
//                "responsive": true,
                "pageLength": 20,
                "language": {
                    "url": "<?php echo e($_ENV['ALIAS']); ?>/js/datatables/Vietnamese.json"
                },
                "initComplete": function () {
                    $("#table_wrapper > .dt-buttons").appendTo("span.panel-button");
                }
            });

            var oSettings = table.settings();

            table.columns().every(function () {
                var that = this;
                $('input', this.header()).on('keyup change changeDate', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                        oSettings[0]._iDisplayLength = oSettings[0].fnRecordsTotal();
                        table.draw();
                        if (this.id != "filter-status") {
                            reCount();
                        }else{
                            reloadDataExport();
                        }
                        oSettings[0]._iDisplayLength=20;
                        table.draw();
                    }
                });
                $('select', this.header()).on('change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value ? '^' + this.value + '$' : '', true, false).draw();
                        oSettings[0]._iDisplayLength = oSettings[0].fnRecordsTotal();
                        table.draw();
                        reCount();
                        oSettings[0]._iDisplayLength=20;
                        table.draw();
                    }
                });
            });

            $.fn.dataTable.ext.search.push(
                    function (settings, data, dataIndex) {
                        var deadline_from = $('#deadline_from').val();
                        var deadline_to = $('#deadline_to').val();
                        var deadline = data[8]; // use data for the age column

                        deadline_from = deadline_from.split('-').join('/');
                        deadline_to = deadline_to.split('-').join('/');

                        var timeFrom = dateToTime(deadline_from);
                        var timeTo = dateToTime(deadline_to);
                        var time = dateToTime(deadline);


                        var steertime_from = $('#steertime_from').val();
                        steertime_from = steertime_from.split('-').join('/');
                        var steertime_to = $('#steertime_to').val();
                        steertime_to = steertime_to.split('-').join('/');
                        var steertime = data[4];

                        var steertimeFrom = dateToTime(steertime_from);
                        var steertimeTo = dateToTime(steertime_to);
                        var steertime = dateToTime(steertime);

                        if (deadline_from == '' && deadline_to == '' && steertime_from == '' && steertime_to == '') {
                            return true;
                        }


                        if (steertime_from == '' && steertime_to == '') {
                            if (deadline_from != '' && deadline_to != '' && (timeFrom <= time && timeTo >= time)) {
                                return true;
                            }
                            else if (deadline_from != '' && deadline_to == '' && (time >= timeFrom)) return true;
                            else if (deadline_from == '' && deadline_to != '' && (time <= timeTo)) return true;

                        }
                        if (steertime_from == '' && steertime_to != '' && steertime < steertimeTo) {
                            if (deadline_from != '' && deadline_to != '' && (timeFrom <= time && timeTo >= time)) {
                                return true;
                            }
                            else if (deadline_from != '' && deadline_to == '' && (time >= timeFrom)) return true;
                            else if (deadline_from == '' && deadline_to != '' && (time <= timeTo)) return true;
                        }
                        if (steertime_from != '' && steertime_to == '' && steertime > steertimeFrom) {
                            if (deadline_from != '' && deadline_to != '' && (timeFrom <= time && timeTo >= time)) {
                                return true;
                            }
                            else if (deadline_from != '' && deadline_to == '' && (time >= timeFrom)) return true;
                            else if (deadline_from == '' && deadline_to != '' && (time <= timeTo)) {
                                return true;
                            }
                        }
                        if (steertime_from != '' && steertime_to != '' && steertime < steertimeTo && steertime > steertimeFrom) {
                            if (deadline_from != '' && deadline_to != '' && (timeFrom <= time && timeTo >= time)) {
                                return true;
                            }
                            else if (deadline_from != '' && deadline_to == '' && (time >= timeFrom)) return true;
                            else if (deadline_from == '' && deadline_to != '' && (time <= timeTo)) {
                                return true;
                            }
                        }
                        if (deadline_from == '' && deadline_to == '') {
                            if (steertime_from != '' && steertime_to != '' && (steertimeFrom <= steertime && steertimeTo >= steertime)) {
                                return true;
                            }
                            else if (steertime_from != '' && steertime_to == '' && (steertime >= steertimeFrom)) return true;
                            else if (steertime_from == '' && steertime_to != '' && (steertime <= steertimeTo)) return true;

                        }
                        if (deadline_from != '' && deadline_to == '' & time > timeFrom) {
                            if (steertime_from != '' && steertime_to != '' && (steertimeFrom <= steertime && steertimeTo >= steertime)) {
                                return true;
                            }
                            else if (steertime_from != '' && steertime_to == '' && (steertime >= steertimeFrom)) return true;
                            else if (steertime_from == '' && steertime_to != '' && (steertime <= steertimeTo)) return true;
                        }
                        if (deadline_from == '' && deadline_to != '' && time < timeTo) {
                            if (steertime_from != '' && steertime_to != '' && (steertimeFrom <= steertime && steertimeTo >= steertime)) {
                                return true;
                            }
                            else if (steertime_from != '' && steertime_to == '' && (steertime >= steertimeFrom)) return true;
                            else if (steertime_from == '' && steertime_to != '' && (steertime <= steertimeTo)) return true;
                        }
                        if (deadline_from != '' && deadline_to != '' && time > timeFrom && time < timeTo) {
                            if (steertime_from != '' && steertime_to != '' && (steertimeFrom <= steertime && steertimeTo >= steertime)) {
                                return true;
                            }
                            else if (steertime_from != '' && steertime_to == '' && (steertime >= steertimeFrom)) return true;
                            else if (steertime_from == '' && steertime_to != '' && (steertime <= steertimeTo)) return true;
                        }

                        if (deadline_from != '' && deadline_to != '' && steertime_from != '' && steertime_to != '') {
                            if ((timeFrom <= time && timeTo >= time) && (steertimeFrom <= steertime && steertimeTo >= steertime)) {
                                return true;
                            }
                        }
                        return false;
                    }
            );

            $("#form").submit(function (event) {
                table.draw();
                var val = $('input[name="source"]').val();
                $("#id_source").val(val);
                $("#id_source").trigger("change");

                var val = $('input[name="conductor"]').val();
                $("#id_conductor").val(val);
                $("#id_conductor").trigger("change");

                var val = $("#fList").val();
                $("#id_funit").val(val);
                $("#id_funit").trigger("change");

                var val = $("#sList").val();
                $("#id_sunit").val(val);
                $("#id_sunit").trigger("change");

                var val = $("#progress").val();
                $("#filter-status").val(val);
                $("#filter-status").trigger("change");
                oSettings[0]._iDisplayLength = oSettings[0].fnRecordsTotal();
                table.draw();
                reCount();
                oSettings[0]._iDisplayLength=20;
                table.draw();
                return false;

            });

        });

        function clearFilter() {
            $('input[name="source"]').val("");
            $('input[name="conductor"]').val("");
            $("#fList").val(0).trigger('change');
            $("#sList").val(0).trigger('change');
            $("#progress").val(0).trigger('change');
            $('input[name="steertime_from"]').val("");
            $('input[name="steertime_to"]').val("");
            $('input[name="deadline_from"]').val("");
            $('input[name="deadline_to"]').val("");

            $('input:radio[name=psource]').prop('checked', false);
            $('input:radio[name=pviphuman]').prop('checked', false);
            $('input:radio[name=pfunit]').prop('checked', false);
            $('input:radio[name=psunit]').prop('checked', false);

            $("#form").submit();
        }

        //            $('input[name="source"]').change(function () {
        //                var val = $('input[name="source"]').val();
        //                $("#id_source").val(val);
        //                $("#id_source").trigger("change");
        //            });
        //            $('input[name="conductor"]').change(function () {
        //                var val = $('input[name="conductor"]').val();
        //                $("#id_conductor").val(val);
        //                $("#id_conductor").trigger("change");
        //            })
        //
        //            $('#fList').on("select2:select", function (event) {
        //                var val = $("#fList").val();
        //                $("#id_funit").val(val);
        //                $("#id_funit").trigger("change");
        //            });
        //            $('#sList').on("select2:select", function (event) {
        //                var val = $("#sList").val();
        //                $("#id_sunit").val(val);
        //                $("#id_sunit").trigger("change");
        //            });
        //
        //            $('#progress').change(function() {
        //                var val = $("#progress").val();
        //                $("#filter-status").val(val);
        //                $("#filter-status").trigger("change");
        //            });

        //                $('#deadline_to').change(function() {
        //                    table.draw();
        //                });
        // select2 - multiple select
        $(".select-multiple").select2();
        $(".select-single").select2();
        $(".select2-container").css("width", "auto");
    </script>
    <script>
        //loc theo trang thai
        function reCount() {
            $(".count-st").each(function () {
//                console.log($(this).attr('id'));
                $(this).html($('.' + $(this).attr('id')).length);
            });
            var v1 = $('.row-st-1').length + $('.row-st-5').length;
            var v2 = $('.row-st-4').length;
            var v3 = $('.row-st-2').length;
            var v4 = $('.row-st-3').length;
            var v5 = $('.row-st-6').length;
            $("#btn-export").attr('href', '<?php echo e($_ENV['ALIAS']); ?>/report/export?v1=' + v1 + "&v2=" + v2 + "&v3=" + v3 + "&v4=" + v4 + "&v5=" + v5 + "&f=" + getFilterString() + "");
            getDataExport();
            reloadDataExport();
        }
        function getFilterString() {
            var filter = "";
            if ($("#source").val() != "") {
                filter += "Nguồn chỉ đạo: " + $("#source").val() + "; "
            }
            if ($("#viphuman").val() != "") {
                filter += "LĐ Bộ pt: " + $("#viphuman").val() + "; "
            }
            if ($("#fList").val() != "") {
                filter += "Đơn vị đầu mối: " + $("#fList").val() + "; "
            }
            if ($("#sList").val() != "") {
                filter += "Đơn vị phối hợp: " + $("#sList").val() + "; "
            }
            if ($("#steertime_from").val() != "" || $("#steertime_to").val() != "") {
                filter += "Ngày chỉ đạo";
                if ($("#steertime_from").val() != "") {
                    filter += " từ " + $("#steertime_from").val();
                }
                if ($("#steertime_to").val() != "") {
                    filter += " đến " + $("#steertime_to").val();
                }
                filter += "; "
            }
            if ($("#deadline_from").val() != "" || $("#deadline_to").val() != "") {
                filter += "Thời hạn hoàn thành";
                if ($("#deadline_from").val() != "") {
                    filter += " từ " + $("#deadline_from").val();
                }
                if ($("#deadline_to").val() != "") {
                    filter += " đến " + $("#deadline_to").val();
                }
                filter += "; "
            }
            if ($("#progress").val() != "") {
                filter += "Tiến độ: " + $( "#progress option:selected" ).text();
            }
            return filter;
        }
        function filterStatus(status) {
            $("#progress").val(status);
            $(".a-status").css('font-weight', 'normal');
            $("#a" + status).css('font-weight', 'bold');
            $("#filter-status").val(status);
            $("#filter-status").trigger("change");
        }

        var data_unit = {};
        function getDataExport(){
            var data =  new Array();
            if ($("#fList").val() != "") {
                var v1 = $('.row-st-1').length + $('.row-st-5').length;
                var v2 = $('.row-st-4').length;
                var v3 = $('.row-st-2').length;
                var v4 = $('.row-st-3').length;
                var v5 = $('.row-st-6').length;
                data.push({
                    "unit" : $("#fList").val(),
                    "v1" : v1,
                    "v2" : v2,
                    "v3" : v3,
                    "v4" : v4,
                    "v5" : v5,
                    "total": v1 + v2 + v3 + v4 + v5
                });
            }else{
                var d = {};
                <?php $__currentLoopData = $unitall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    d = countByUnit("<?php echo e($u->name); ?>");
                    console.log(d);
                    if (d.total != 0){
                        data.push(d)
                    }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            data_unit =  data;
        }

        function countByUnit(unit){
            unit = unit.replace(/&amp;/g, '&');
            var data = [];
            var countall = 0;
            for (var i = 1; i <= 6; i++){
                var count = 0;
                $(".unit-st-" + i).each(function(){
//                    console.log($(this).text());
                    if ($(this).text().indexOf(unit) !== -1){
                        count ++;
                        countall ++;
                    }
                });
                data[i] = count;
            }
            return {
                'unit': unit,
                "v1" : data[1] + data[5],
                "v2" : data[4],
                "v3" : data[2],
                "v4" : data[3],
                "v5" : data[6],
                "total": countall
            }
        }

        function exportUnit(){
            console.log(data_unit);
            var filter = getFilterString();
            console.log("filer: " + filter);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "<?php echo e($_ENV['ALIAS']); ?>/report/exportunit",
                type: 'POST',
                dataType: 'json',
                data: {_token: $('meta[name="csrf-token"]').attr('content'), filter:filter, data: data_unit},
                async: false,
                success: function (result) {
                    console.log(result);
                    window.location.href = "<?php echo e($_ENV['ALIAS']); ?>" + result.file;
                },
                error: function () {
                    alert("Xảy ra lỗi nội bộ");
                },
            });
        }
    </script>
    <style>
        #table_filter {
            display: none;
        }

        input.datepicker {
            max-width: 120px;
        }

        .select2 .select2-container {
            width: auto !important;
        }

        .input-contain {
            display: inline-block;
        }

        .search-box {
            border-bottom: 1px solid #ccc;
            margin-bottom: 10px;
        }

        label{
            width: 180px !important;
        }

        @media  screen and (max-width: 600px) {
            .mi {
                width: 85%;
            }

            .input-contain {
                width: 100%;
            }

            .fl {
                float: left;
            }

            .form-group {
                margin-bottom: 5px;
            }

            .select2-container {
                min-width: 85% !important;
            }

            .ml10 {
                margin-left: 10px;
            }
        }
    </style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>