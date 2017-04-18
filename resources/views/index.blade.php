@extends('layout')
@section('page-title')
    Lịch công tác
@stop
@section('content')
    <script language="javascript">
        function deleteCalendar(id) {
            if (confirm("Bạn có muốn xóa?")) {
                document.getElementById("calendar_id").value = id;
                frmxoa.submit();
            }
        }

    </script>
    {!! Form::open(array('route' => 'delete-calendar', 'class' => 'form', 'id' => 'frmxoa')) !!}
    <input type="hidden" name="id" id="calendar_id">
    <input type="hidden" name="back" value="{{\Request::getRequestUri()}}">
    {!! Form::close() !!}
    <div>
        <div style="font-size: 1.1em">
            <div class="text-center pull-left">
                BỘ GIÁO DỤC VÀ ĐÀO TẠO<br>
                <strong>VĂN PHÒNG</strong>
            </div>
        </div>
        <div class="pull-right text-center blur" style="padding-bottom: 40px">
            <strong>LỊCH CÔNG TÁC CỦA LÃNH ĐẠO VĂN PHÒNG</strong><br>
            Tuần <input type="text" id="week-picker" value="{{$week}}" class="form-control"
                        style="width: 45px; display: initial; color: blue"><br>
            <i>(Từ <span id="start-week">{{date( 'd/m/Y', strtotime( 'monday this week' ) )}}</span> đến <span
                        id="end-week">{{date( 'd/m/Y', strtotime( 'sunday this week' ) )}}</span>)</i>
        </div>
    </div>
    <div style="position: absolute; margin-top: 70px">
        <a class="btn btn-my" href="/update">Đăng kí lịch</a>
    </div>
    <table class="table table-bordered table-calendar">
        @foreach($calendar as $key=>$row)
            <tr>
                <td colspan="4" class="blur"><strong>{{$key}}</strong></td>
            </tr>
            @foreach($row as $cal)
                <tr>
                    <td class="text-center">{{\App\Utils::timeInDay($cal->date_note)}}</td>
                    <td>
                        <strong>{{$cal->content}}</strong><br>
                        <i>Thành phần tham dự: </i>{{$cal->member}}
                    </td>
                    <td class="td-action"><a href="/update?id={{$cal->id}}"><img height="20" border="0" src="/img/edit.png" title="Cập nhật lịch"></a></td>
                    <td class="td-action"><a href="javascript:deleteCalendar('{{$cal->id}}')"><img height="20" border="0" src="/img/delete.png" title="Xóa lịch"></a></td>
                </tr>
            @endforeach
        @endforeach
    </table>

    <script>
        convertToWeekPicker($("#week-picker"));
    </script>
@stop