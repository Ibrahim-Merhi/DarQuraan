@extends('layouts.app')
<style>
    .grid-container {
        display: grid;
        grid-template-columns: 10% auto auto auto auto auto auto;
        /* padding: 10px; */
    }

    .grid-item {
        border: 1px solid rgba(0, 0, 0, 0.8);
        /* padding: 20px; */
        font-size: 14px;
        text-align: center;

    }

    .timesheet {
        word-wrap: break-word;
    }

    @media print {
        .hidden-print {
            display: none !important;
        }
    }

    span {
        cursor: pointer;
    }
</style>
@section('title')
@if(auth()->user()->group== 1)
السجل الأسبوعي الخاص ب: {{$user->name}} {{$user->last_name}}
@else
جدول التلاميذ
@endif
@endsection

@section('content')

@if (session('error'))
<div class="alert alert-danger" role="alert">

    {{session('error')}}

</div>

@endif
@if(count($timesheets) < 1 ) <a href="{{route('time.create')}}" class="btn btn-primary  mb-3 ml-3 hidden-print">
    اضافة سجل
    <i class="fa fa-plus"></i>
    </a>
    @else

    @if(auth()->user()->group== 1)

    <a href="{{route('users.index')}}" class="btn btn-primary  mb-3 ml-3 hidden-print">
        الرجوع
        <i class="fa fa-back"></i>
    </a>

    @else
    <a href="{{route('time.create')}}" class="btn btn-primary  mb-3 ml-3 hidden-print">
        اضافة سجل
        <i class="fa fa-backward"></i>
    </a>
    @endif
    <h6>
        السجل الأسبوعي الخاص ب: {{$user->name}} {{$user->last_name}}
    </h6>

    <div class="grid-container">
        <div class="grid-item">
            <span>
                الوقت
            </span>
            <hr>
            @foreach($time_shift as $time )
            {{$time}}

            <br>




            @endforeach
        </div>
        <div class="grid-item timesheet">
            <span>
                الاثنين
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 1)
            <span class="timesheet" onclick="edit('{{$timesheet->timesheet_id}}')">
                {{$timesheet->student_name}} {{$timesheet->student_last_name}}

            </span>


            @endif


            @endforeach
            <br>




            @endforeach
        </div>
        <div class="grid-item">
            <span>
                الثلاثاء
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 2)
            <span class="timesheet" onclick="edit('{{$timesheet->timesheet_id}}')">
                {{$timesheet->student_name}} {{$timesheet->student_last_name}}

            </span>

            @endif


            @endforeach
            <br>
            @endforeach
        </div>
        <div class="grid-item"> <span>
                الأربعاء
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 3)
            <span class="timesheet" onclick="edit('{{$timesheet->timesheet_id}}')">
                {{$timesheet->student_name}} {{$timesheet->student_last_name}}

            </span>

            @endif


            @endforeach
            <br>
            @endforeach
        </div>
        <div class="grid-item"> <span>
                الخميس
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 4)
            <span class="timesheet" onclick="edit('{{$timesheet->timesheet_id}}')">
                {{$timesheet->student_name}} {{$timesheet->student_last_name}}

            </span>

            @endif


            @endforeach
            <br>
            @endforeach
        </div>
        <div class="grid-item"> <span>
                الجمعه
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 5)
            <span class="timesheet" onclick="edit('{{$timesheet->timesheet_id}}')">
                {{$timesheet->student_name}} {{$timesheet->student_last_name}}

            </span>

            @endif


            @endforeach
            <br>
            @endforeach
        </div>
        <div class="grid-item"> <span>
                السبت
            </span>
            <hr>

            @foreach($time_shift as $date => $time )


            @foreach($timesheets as $timesheet)

            @if($timesheet->time_day == $date && $timesheet->day_name== 6)

            <span class="timesheet" onclick="edit('{{$timesheet->timesheet_id}}')">
                {{$timesheet->student_name}} {{$timesheet->student_last_name}}

            </span>


            @endif


            @endforeach
            <br>
            @endforeach
        </div>

    </div>

    @endif



    @endsection
    @section('scripts')
    <script>
        function edit(id) {
            location.href = `{{url("/time")}}/${id}`

        }
    </script>

    @endsection
