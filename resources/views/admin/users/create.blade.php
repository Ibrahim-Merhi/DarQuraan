@extends('layouts.app')
<style>
    body {
        direction: rtl;
        padding: 50px
    }

    label {
        float: right;
    }
</style>

@section('title')
اضافة مستخدم

@endsection

@section('content')

<form action="{{route('users.store')}}" method="POST">
    @csrf
    <!-- 2 fields per row -->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" name="name" id="name" required autocomplete="off" placeholder="الاسم">
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
            @error('sex')


            <div class="danger" role="alert">
                <strong>
                    {{$message}}
                </strong>
            </div>
            @enderror

        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="m_name">عنوان السكن</label>
                <input type="text" class="form-control" name="address" id="address" required autocomplete="off" placeholder=" ...">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="m_name">الايميل</label>
                <input type="email" class="form-control" name="email" id="email" required autocomplete="off" placeholder="example@gmail.com">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="password">كلمة السر</label>
                <input type="password" class="form-control" name="password" id="password" required autocomplete="off" placeholder="كلمة السر">
            </div>
        </div>






    </div>
    <button type="submit" class="btn btn-primary float-right mt-3">
        <i class="fas fa-save"></i>
        اضافة مستخدم
    </button>
    <button type="reset" class="btn btn-danger float-right mt-3 mr-3">
        <i class="fas fa-trash-alt"></i>
        مسح الحقول
    </button>
    <button type="button" class="btn btn-secondary float-right mt-3 mr-3" onclick="window.location.href='{{route('users.index')}}'">
        <i class="fas fa-backward"></i>
        رجوع
    </button>

</form>




@endsection
