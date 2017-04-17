@extends('layout')
@section('page-title')
    Lịch công tác
@stop
@section('content')
    <div class="text-center title">ĐĂNG KÍ LỊCH CÔNG TÁC</div>
    {!! Form::open(array('id' => 'steeringcontent-update', 'route' => 'add-calendar', 'class' => 'form')) !!}
    <div class="form-group form-inline">
        <label>1. Tuần chọn: </label>
        <input type="text" id="week-picker" value="{{date("W")}}" class="form-control input-week">
        <i>(Từ <span id="start-week">{{date( 'd/m/Y', strtotime( 'monday this week' ) )}}</span> đến <span
                    id="end-week">{{date( 'd/m/Y', strtotime( 'sunday this week' ) )}}</span>)</i>
    </div>

    <div class="form-group form-inline">
        <label>2. Ngày</label>
        <label class="radio-inline">
            <input type="radio" class="form-control" name="date_note" id="i_2" value="{{date( 'd/m/Y', strtotime( 'monday this week' ))}}">
            Thứ 2
            <div id="d_2">{{date( 'd/m/Y', strtotime( 'monday this week' ))}}</div>
        </label>

        <label class="radio-inline">
            <input type="radio" class="form-control" name="date_note" id="i_3" value="{{date( 'd/m/Y', strtotime( 'tuesday this week' ))}}">
            Thứ 3
            <div id="d_3">{{date( 'd/m/Y', strtotime( 'tuesday this week' ))}}</div>
        </label>

        <label class="radio-inline">
            <input type="radio" class="form-control" name="date_note" id="i_4" value="{{date( 'd/m/Y', strtotime( 'wednesday this week' ))}}">
            Thứ 4
            <div id="d_4">{{date( 'd/m/Y', strtotime( 'wednesday this week' ))}}</div>
        </label>

        <label class="radio-inline">
            <input type="radio" class="form-control" name="date_note" id="i_5" value="{{date( 'd/m/Y', strtotime( 'thursday this week' ))}}">
            Thứ 5
            <div id="d_5">{{date( 'd/m/Y', strtotime( 'thursday this week' ))}}</div>
        </label>

        <label class="radio-inline">
            <input type="radio" class="form-control" name="date_note" id="i_6" value="{{date( 'd/m/Y', strtotime( 'friday this week' ))}}">
            Thứ 6
            <div id="d_6">{{date( 'd/m/Y', strtotime( 'friday this week' ))}}</div>
        </label>

        <label class="radio-inline">
            <input type="radio" class="form-control" name="date_note" id="i_7" value="{{date( 'd/m/Y', strtotime( 'saturday this week' ))}}">
            Thứ 7
            <div id="d_7">{{date( 'd/m/Y', strtotime( 'saturday this week' ))}}</div>
        </label>

        <label class="radio-inline">
            <input type="radio" class="form-control" name="date_note" id="i_8" value="{{date( 'd/m/Y', strtotime( 'sunday this week' ))}}">
            Chủ nhật
            <div id="d_8">{{date( 'd/m/Y', strtotime( 'sunday this week' ))}}</div>
        </label>
    </div>

    <div class="form-group form-inline">
        <label>3. Lãnh đạo</label>
        <label class="radio-inline"><input type="radio" class="form-control" name="optradio">Bộ trưởng Phùng Xuân Nhạ</label>
        <label class="radio-inline"><input type="radio" name="optradio">Thứ trưởng Nguyễn Thị Nghĩa</label>
        <label class="radio-inline"><input type="radio" name="optradio">Thứ trưởng Bùi Văn Ga</label>
        <label class="radio-inline"><input type="radio" name="optradio">Thứ trưởng Phạm Mạnh Hùng</label>
        <label class="radio-inline"><input type="radio" name="optradio">Các đoàn thể</label>
    </div>
    <div class="form-group form-inline">
        <label>4. Thời gian:</label>
        <div class="input-group clockpicker" data-align="top" data-autoclose="true">
            <input type="text" class="form-control" name="time_in_day" id="time_in_day">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
        </div>
    </div>
    <div class="form-group form-inline">
        <label>5. Phòng:</label>
        <select class="form-control" name="member" id="member">
            <option selected="selected" value="0">-</option>
            <option value="9">B121</option>
            <option value="7">D203</option>
            <option value="3">D205</option>
            <option value="1">PH.B</option>
            <option value="2">PH.C</option>
            <option value="6">PH.D</option>
            <option value="10">PH.E</option>
            <option value="5">PH.G</option>
            <option value="4">PH.H</option>
            <option value="8">HT.A</option>
        </select>
    </div>
    <div class="form-group form-inline">
        <label>6. Nội dung:</label>
        <textarea class="form-control" cols="20" rows="2" name="content" style="width: 50%"></textarea>
    </div>

    <div class="form-group form-inline">
        <input type="submit" class="form-control btn-primary" value="Lưu thay đổi">
        <input type="reset" class="form-control btn-default" value="Làm lại">
    </div>
    {!! Form::close() !!}
    <script src="{{env('ALIAS')}}/js/jquery-clockpicker.js"></script>
    <script>
        convertToWeekPicker($("#week-picker"));
        $('.clockpicker').clockpicker();
    </script>
@stop