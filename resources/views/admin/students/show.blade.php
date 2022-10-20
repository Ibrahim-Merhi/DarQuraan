@extends('layouts.app')
@section('title')
الطالب {{{$student->name}}}
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
</style>
@section('content')
<!-- details of student -->
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">
                        <i class="fas fa-home"></i>
                        الرئيسية</a></li>

                </a></li>
                <li class="breadcrumb-item"><a href="{{route('students.index')}}">
                        الطلاب
                    </a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{{$student->name}}}
                </li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->
                            <div class="mt-3">
                                <h4>
                                    {{{$student->name}}} {{{$student->last_name}}}
                                </h4>
                                <p class="text-secondary mb-1">
                                    اسم المعلم
                                    <br>

                                </p>
                                <span class="user_name">
                                    {{{$users->name}}}{{$users->last_name}}

                                </span>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">
                                    الاسم الكامل:
                                </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->name}} {{$student->lastname}} {{$student->m_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">رقم الهاتف</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->phone}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">عنوان السكن</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->address}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">الحالة</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($student->active == 1)
                                <span class="text-success">مفعل</span>


                                @else
                                <i class="text-danger">غير مفعل</i>

                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">الحنس</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($student->sex == 'm')
                                <img src="https://img.icons8.com/ios-glyphs/24/0652DD/male.png" />
                                ذكر


                                @else
                                <img src="https://img.icons8.com/ios-glyphs/24/ea8ced/female.png" />
                                أنثى

                                </i> @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-primary " target="__blank" href="{{url('/students/'.$student->id.'/edit')}}">
                                    <i class="fa fa-edit"></i>
                                    تعديل البيانات
                                </a>
                                <!-- <a class="btn btn-primary " target="__blank" href="{{url('/students/'.$student->id.'/edit')}}">
                                    <i class="fa fa-trash"></i>
                                    مسح السجل
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>

    </div>
</div>


@endsection
