@extends('layouts.app')

@section('title')
تعديل بيانات المستخدم
@endsection

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
                                <h4> {{$user->name}} {{$user->last_name}}
                                </h4>
                                <p class="text-secondary mb-1">
                                </p>

                            </div>
                        </div>
                        <hr class="my-4">

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <form method="POST" action="{{ route('users.update' , $user->id) }}" role="form">
                        @csrf

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الاسم</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$user->name}}" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">اسم الاب</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$user->m_name}}" name="m_name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">العائلة</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الهاتف</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$user->phone}}" name="phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الايميل</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$user->email}}" name="email" placeholder="ايميل الطالب">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">عنوان السكن</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$user->address}}" name="address" placeholder="عنوان السكن">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الحالة</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                   <select class="form-control form-select" name="active">
                                    <option value="1" {{$user->active == 1 ? 'selected' : ''}}>نشط</option>
                                    <option value="0" {{$user->active == 0 ? 'selected' : ''}}>متوقف</option>

                                   </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="حفظ التغييرات">
                                    <a class="btn btn-secondary float-right" href="/users">
                                        <i class="fas fa-backward"></i>
                                        رجوع
                                    </a>

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
