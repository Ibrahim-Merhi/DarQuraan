@extends('layouts.app')
<style>
    table {
        direction: rtl;

    }
</style>
@section('title')
المستخدمين
@endsection

@section('content')
@if(count($users) > 0)
<a href="{{route('users.create')}}" class="btn btn-primary  mb-3 ml-3">إضافة مستخدم
    <i class="fa fa-plus"></i>
</a>
@endif
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>العائلة</th>


            <th>الحالة</th>
            <th>
                السجل
            </th>



        </tr>
    </thead>

    <tbody>
        @forelse ($users as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->last_name}}</td>

            <td>
                @if($student->active)
                مسجل
                @else
                غير مسجل
                @endif
            </td>
            <td>
                <a href="{{route('users.show', $student->id)}}" class="btn btn-primary">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{route('users.edit', $student->id)}}" class="btn btn-warning">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('users.password', ['id'=>$student->id])}}" class="btn btn-danger">
                    <i class="fas fa-key"></i>
                </a>
                @if($student->group != 1)
                <a href="{{route('time.byid', ['id'=>$student->id])}}" class="btn btn-success">
                    <i class="fas fa-calendar"></i>
                </a>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">
                لا يوجد طلاب <a href="{{route('users.create')}}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    اضافة طالب
                </a>
            </td>

        </tr>

        @endforelse
    </tbody>
</table>




@endsection
