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
    {!! Form::close() !!}
    <script>
        convertToWeekPicker($("#week-picker"));
    </script>
@stop