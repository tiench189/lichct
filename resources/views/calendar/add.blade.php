@extends('layout')
@section('page-title')
    Lịch công tác
@stop
@section('content')
    <div class="text-center title">ĐĂNG KÍ LỊCH CÔNG TÁC</div>
    {!! Form::open(array('id' => 'add-calendar', 'route' => 'add-calendar', 'class' => 'form')) !!}
    <input type="hidden" value="{{$id}}" name="id">
    <?php $year = date("Y"); ?>
    <table class="table table-borderless">
        <tr>
            <td class="left-label">
                1. Tuần chọn:
            </td>
            <td>
                <div class="form-group form-inline">
                    <input type="text" id="week-picker" value="{{$week}}" class="form-control input-week" required
                           name="week">
                    <i>(Từ <span id="start-week">{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."1") )}}</span> đến <span
                                id="end-week">{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."7") )}}</span>)</i>
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
                                       value="{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."1") )}}" required>
                                Thứ 2
                                <div id="d_2">{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."1") )}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_3"
                                       value="{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."2") )}}">
                                Thứ 3
                                <div id="d_3">{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."2") )}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_4"
                                       value="{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."3") )}}">
                                Thứ 4
                                <div id="d_4">{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."3") )}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_5"
                                       value="{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."4") )}}">
                                Thứ 5
                                <div id="d_5">{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."4") )}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_6"
                                       value="{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."5") )}}">
                                Thứ 6
                                <div id="d_6">{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."5") )}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_7"
                                       value="{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."6") )}}">
                                Thứ 7
                                <div id="d_7">{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."6") )}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="radio-inline radio-day">
                                <input type="radio" name="date_note" id="i_8"
                                       value="{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."7") )}}">
                                Chủ nhật
                                <div id="d_8">{{date( 'd/m/Y', strtotime($year."W".str_pad($week,2,0,STR_PAD_LEFT)."7") )}}</div>
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
                        <input type="checkbox" name="viphuman[]" vip="{{$v->name}}"
                               value="{{$v->id}}" {{($id > 0 && strpos($calendar->viphuman, '|'.$v->id."|") !== false)?'checked':''}}> {{$v->name}}
                        &nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td class="left-label">4. Thời gian:</td>
            <td>
                <div class="input-group clockpicker input-clock" data-align="top" data-autoclose="true">
                    <input type="text" class="form-control" name="time_in_day" id="time_in_day" required
                           value="{{($id > 0)?date('G:i', strtotime($calendar->date_note)):''}}">
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
                    @if($id > 0)
                        <?php $member = explode(";", $calendar->member)?>
                        @foreach($unit as $c)
                            <option value="{{$c->name}}" {{in_array($c->name, $member)?'selected':''}}>{{$c->name}}</option>
                        @endforeach
                        @foreach($member as $m)
                            @if(!in_array($m, $arrunit))
                                <option value="{{$m}}" selected>{{$m}}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach($unit as $c)
                            <option value="{{$c->name}}">{{$c->name}}</option>
                        @endforeach
                    @endif
                </select>
            </td>
        </tr>
        <tr>
            <td class="left-label">6. Nội dung:</td>
            <td>
                <textarea class="form-control" rows="2" name="content" required>{{($id > 0)?$calendar->content:''}}</textarea>
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
        @if($id > 0)
        $("input[name='date_note']").each(function () {
            if ($(this).val() == "{{date("d/m/Y", strtotime($calendar->date_note))}}") {
                $(this).prop('checked', true);
            }
        });
        @endif
        $("input[name='viphuman[]']").change(function(){
            console.log("change");
            $("input[name='viphuman[]']:checked").each(function () {
                console.log($(this).attr('vip'));
                $("textarea[name='content']").html();
            });
        });

        $('#add-calendar').submit(function () {
            var atLeastOnePersonChose = $('input[name="viphuman[]"]:checked').length > 0;

            if (!atLeastOnePersonChose) {
                alert("Vui lòng chọn lãnh đạo");
                return false;
            }
        });
    </script>
@stop