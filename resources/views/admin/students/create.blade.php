@extends('layouts.app')
<style>
    body {
        direction: rtl;
        padding: 50px
    }

    label {
        float: right;
    }
    .title_create{
        font-weight: bold;
        color:white;
        background-color: #dc3545;
        height: 50px;
        font-size: large;
        padding: 10px 10px;
        border-radius: 5px;
        /* margin-bottom: 100px; */
    }
</style>

@section('title')
اضافة طالب

@endsection

@section('content')
<center>
    <span class="title_create">
        تسجيل طالب جديد
    </span>
</center>
<br>
<form action="{{route('students.store')}}" method="POST">
    @csrf
    <!-- 2 fields per row -->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" name="name" id="name" required autocomplete="off" placeholder="اسم الطالب">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="m_name">اسم الأب</label>
                <input type="text" class="form-control" name="m_name" id="m_name" required autocomplete="off" placeholder="اسم الأب">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="last_name">العائلة</label>
                <input type="last_name" class="form-control" name="last_name" id="last_name" required autocomplete="off" placeholder="العائلة">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone">رقم الهاتف</label>
                <input type="text" class="form-control" name="phone" id="phone" required autocomplete="off" placeholder="رقم الهاتف">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="sex">
                    الحنس
                </label>
                <select id="sex" class="form-control form-select" name="sex">
                    <option value="m">
                        ذكر
                    </option>
                    <option value="f">
                        أنثى
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="m_name">عنوان السكن</label>
                <input type="text" class="form-control" name="address" id="address" required autocomplete="off" placeholder="اين يسكن الطالب؟">
            </div>
        </div>
        @if(auth()->user()->group == 1)
        <div class="col-md-3">
            @if(count($users) > 0)
            <div class="form-group ">
                <label for="user_id">الاستاذ</label>
                <select id="user_id" class="form-control form-select" name="user_id">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">
                        {{$user->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="form-group">
                <label for="user_id">الاستاذ</label>

                <a href="{{route('users.create')}}" class="btn btn-primary form-control">
                    اضافة مستخدم جديد
                </a>
            </div>
            @endif
        </div>
        @endif





    </div>
    <button type="submit" class="btn btn-primary float-right mt-3">
        <i class="fas fa-save"></i>
        اضافة طالب
    </button>
    <button type="reset" class="btn btn-danger float-right mt-3 mr-3">
        <i class="fas fa-trash-alt"></i>
        مسح الحقول
    </button>
    <button type="button" class="btn btn-secondary float-right mt-3 mr-3" onclick="window.location.href='{{route('students.index')}}'">
        <i class="fas fa-backward"></i>
        رجوع
    </button>
</form>




@endsection
