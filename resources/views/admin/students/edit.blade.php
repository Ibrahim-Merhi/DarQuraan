@extends('layouts.app')

@section('title')
تعديل بيانات الطالب
@endsection
<style>
    .user_name {
        display: inline-block;
        background-color: #5cb85c;
        padding: 0.35em 0.65em;
        font-size: .75em;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .badge-success {
        background-color: #5cb85c;

    }
</style>
@section('content')
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <!-- <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110"> -->
                            <div class="mt-3">
                                <h4> {{$student->name}} {{$student->last_name}}

                                </h4>
                                <p class="text-secondary mb-1">
                                    اسم المعلم
                                    <br>


                                </p>
                                <span class="user_name">
                                    {{$users->name}} {{$users->last_name}}
                                </span>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form action="{{route('students.update',$student->id)}}" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الاسم</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" required class="form-control" value="{{$student->name}}" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">اسم الاب</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" required class="form-control" value="{{$student->m_name}}" name="m_name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">العائلة</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" required class="form-control" value="{{$student->last_name}}" name="last_name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الهاتف</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" required class="form-control" value="{{$student->phone}}" name="phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الايميل</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$student->email}}" name="email" placeholder="ايميل الطالب">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">عنوان السكن</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" required class="form-control" value="{{$student->address}}" name="address" placeholder="عنوان السكن">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الجنس</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="form-control form-select" name="sex">
                                        <option value="m" {{$student->sex == 'm' ? 'selected' : ''}}>ذكر</option>
                                        <option value="f" {{$student->sex == 'f' ? 'selected' : ''}}>أنثى</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الحالة</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="form-control form-select" name="active">
                                        <option value="1" {{$student->active == 1 ? 'selected' : ''}}>مسجل</option>
                                        <option value="0" {{$student->active == 0 ? 'selected' : ''}}>غير مسجل</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="حفظ التغييرات">
                                </div>
                            </div>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
