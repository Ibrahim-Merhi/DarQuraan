@extends('layouts.app')
@section('title')
الطالب {{{$user->name}}}
@endsection

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
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">
                        المستخدمين
                    </a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{{$user->name}}}
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
                                    {{{$user->name}}} {{{$user->last_name}}}
                                </h4>
                                <p class="text-secondary mb-1">

                                    {{{$user->name}}}
                                </p>

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
                                {{$user->name}} {{$user->lastname}} {{$user->m_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">رقم الهاتف</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->phone}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">عنوان السكن</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->address}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">الحالة</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($user->active == 1)
                                <span class="text-success">مفعل</span>


                                @else
                                <i class="text-danger">غير مفعل</i>

                                @endif
                            </div>
                        </div>
                        <hr>
                        <!-- <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">الحنس</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($user->sex == 'm')
                                <img src="https://img.icons8.com/ios-glyphs/24/0652DD/male.png" />
                                ذكر


                                @else
                                <img src="https://img.icons8.com/ios-glyphs/24/ea8ced/female.png" />
                                أنثى

                                </i> @endif
                            </div>
                        </div> -->
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-primary " target="__blank" href="{{url('/users/'.$user->id.'/edit')}}">
                                    <i class="fa fa-edit"></i>
                                    تعديل البيانات
                                </a>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>

    </div>
</div>


@endsection
