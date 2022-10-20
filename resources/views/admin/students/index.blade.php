@extends('layouts.app')
<style>
    table {
        direction: rtl;

    }
</style>
@section('title')
@if(auth()->user()->group== 1)
قائمة الطلاب
@else
طلابي
@endif
@endsection

@section('content')
@if(count($students) > 0)
<a href="{{route('students.create')}}" class="btn btn-primary  mb-3 ml-3">إضافة طالب
    <i class="fa fa-plus"></i>
</a>
@endif
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>العائلة</th>
            @if(auth()->user()->group== 1)
            <th>المعلم</th>
            @endif

            <th>الحنس</th>

            <th>الحالة</th>
            <th>
                السجل
            </th>



        </tr>
    </thead>

    <tbody>
        @forelse ($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->last_name}}</td>
            @if(auth()->user()->group== 1)

            <td>
                <a href="{{route('users.show', $student->user->id)}}">
                    {{$student->user->name}} {{$student->user->last_name}}
                </a>
            </td>
            @endif
            <td>
                @if($student->sex=='m')
                ذكر
                @else
                أنثى
                @endif
            </td>
            <td>
                @if($student->active)
                مسجل
                @else
                غير مسجل
                @endif
            </td>
            <td>
                <a href="{{route('students.show', $student->id)}}" class="btn btn-primary">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{route('students.edit', $student->id)}}" class="btn btn-warning">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('students.sheet', $student->id)}}" class="btn btn-warning">
                    <i class="fas fa-file-pdf"></i>
                </a>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">
                لا يوجد طلاب <a href="{{route('students.create')}}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    اضافة طالب
                </a>
            </td>

        </tr>

        @endforelse
    </tbody>
</table>




@endsection
