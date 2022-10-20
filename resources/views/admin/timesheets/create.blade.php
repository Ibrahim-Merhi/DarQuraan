@extends('layouts.app')
<style>
    body {
        direction: rtl;
        padding: 50px
    }

    label {
        float: right;
        margin-bottom: 10px;
    }

    .title {
        font-size: 16px;
        font-weight: bold;
    }
</style>

@section('title')
اضافة سجل

@endsection

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8">
            <span class="title">
            </span>
        </div>
    </div>
</div>
@if(session('success'))

<div class="alert alert-success">
    تم إضافة السجل بنجاح
</div>

@endif

@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif
@if(count($student) > 0 )

<form action="{{route('time.store')}}" method="POST">
    @csrf
    <!-- 2 fields per row -->

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">اليوم</label>
                <select class="form-control form-select" name="day_name">
                    @foreach($days as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>

                    @endforeach

                </select>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">الوقت</label>
                <select class="form-control form-select" name="time_day">
                    @foreach($time_shift as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>

                    @endforeach

                </select>

            </div>
        </div>
    </div>
    <div class="row">


        <div class="col-md-3">
            <div class="form-group">
                <label for="last_name">التلميذ</label>
                <select class="form-control form-select" name="student_id">
                    @foreach($student as $student)
                    <option value="{{ $student->id }}">{{ $student->name }} {{$student->last_name}}</option>
                    @endforeach


                </select>
            </div>
        </div>


    </div>
    </div>


    <button type="submit" class="btn btn-primary float-right mt-3" onclick="Check();">
        <i class="fas fa-save"></i>
        حفظ
    </button>
    <button type="reset" class="btn btn-danger float-right mt-3 mr-3" id="savedata">
        <i class="fas fa-trash-alt"></i>
        مسح الحقول
    </button>
    <button type="button" class="btn btn-secondary float-right mt-3 mr-3" onclick="window.location.href=`{{route('time.index')}}`">
        <i class="fas fa-backward"></i>
        رجوع
    </button>
</form>
@else
<center>
    <td colspan="5" class="text-center">
        لا يوجد طلاب <a href="{{route('students.create')}}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            اضافة طالب
        </a>
    </td>

</center>


@endif





@endsection
