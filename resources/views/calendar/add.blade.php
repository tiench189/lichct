@extends('layout')
@section('page-title')
    Lịch công tác
@stop
@section('content')
    <div class="text-center title">ĐĂNG KÍ LỊCH CÔNG TÁC</div>
    {!! Form::open(array('id' => 'add-calendar', 'route' => 'add-calendar', 'class' => 'form')) !!}
    <input type="hidden" value="{{$id}}" name="id">
    <table class="table table-borderless">
        <tr>
            <td class="left-label">
                1. Tuần chọn:
            </td>
            <td>
                <div class="form-group form-inline">
                    <input type="text" id="week-picker" value="{{$week}}" class="form-control input-week" required name="week">
                    <i>(Từ <span id="start-week">{{date( 'd/m/Y', strtotime( 'monday this week' ) )}}</span> đến <span
                                id="end-week">{{date( 'd/m/Y', strtotime( 'sunday this week' ) )}}</span>)</i>
                </div>
            </td>
        </tr>
        <tr>
            <td class="left-label">
                2. Ngày:
            </td>
            <td>
                <table class="table table-borderless table-day">
                    <tr>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_2"
                                       value="{{date( 'd/m/Y', strtotime( 'monday this week' ))}}" required>
                                Thứ 2
                                <div id="d_2">{{date( 'd/m/Y', strtotime( 'monday this week' ))}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_3"
                                       value="{{date( 'd/m/Y', strtotime( 'tuesday this week' ))}}">
                                Thứ 3
                                <div id="d_3">{{date( 'd/m/Y', strtotime( 'tuesday this week' ))}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_4"
                                       value="{{date( 'd/m/Y', strtotime( 'wednesday this week' ))}}">
                                Thứ 4
                                <div id="d_4">{{date( 'd/m/Y', strtotime( 'wednesday this week' ))}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_5"
                                       value="{{date( 'd/m/Y', strtotime( 'thursday this week' ))}}">
                                Thứ 5
                                <div id="d_5">{{date( 'd/m/Y', strtotime( 'thursday this week' ))}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_6"
                                       value="{{date( 'd/m/Y', strtotime( 'friday this week' ))}}">
                                Thứ 6
                                <div id="d_6">{{date( 'd/m/Y', strtotime( 'friday this week' ))}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_7"
                                       value="{{date( 'd/m/Y', strtotime( 'saturday this week' ))}}">
                                Thứ 7
                                <div id="d_7">{{date( 'd/m/Y', strtotime( 'saturday this week' ))}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_8"
                                       value="{{date( 'd/m/Y', strtotime( 'sunday this week' ))}}">
                                Chủ nhật
                                <div id="d_8">{{date( 'd/m/Y', strtotime( 'sunday this week' ))}}</div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="left-label">3. Lãnh đạo:</td>
            <td>
                <div class="form-group form-inline">
                    @foreach($vip as $v)
                        <input type="checkbox" name="viphuman[]" value="{{$v->id}}"> {{$v->name}}&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td class="left-label">4. Thời gian:</td>
            <td>
                <div class="input-group clockpicker input-clock" data-align="top" data-autoclose="true">
                    <input type="text" class="form-control" name="time_in_day" id="time_in_day" required>
                    <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
                </div>
            </td>
        </tr>
        <tr>
            <td class="left-label">5. Tham dự:</td>
            <td>
                <select id="member" name="member[]" class="form-control select-multiple ipw"
                        multiple="multiple">
                    @foreach($unit as $c)
                        <option value="{{$c->name}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td class="left-label">6. Nội dung:</td>
            <td>
                <textarea class="form-control" rows="2" name="content"  required></textarea>
            </td>
        </tr>
    </table>


    <div class="form-group form-inline pull-right">
        <input type="submit" class="form-control btn-my" value="Lưu thay đổi">
        <input type="reset" class="form-control btn-my" value="Làm lại">
    </div>
    {!! Form::close() !!}
    <script src="{{env('ALIAS')}}/js/jquery-clockpicker.js"></script>
    <script>
        convertToWeekPicker($("#week-picker"));
        $('.clockpicker').clockpicker();

        $(".select-multiple").select2({
            tags: true
        });
    </script>
@stop