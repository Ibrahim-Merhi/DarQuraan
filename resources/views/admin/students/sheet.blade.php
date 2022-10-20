@extends('layouts.app')

<style>
    .badge {
        font-size: 12px;
        font-weight: bold;

    }

    .badge-success {
        background-color: #5cb85c;
    }

    .badge-warning {
        background-color: blue;
    }

    .badge-info {
        background-color: #f0ad4e;
    }
</style>

@section('title')
سجل الطالب {{$student->name}}

@endsection

@section('content')

@if(count($revisions) > 0)
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>


@endif
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8">
            <span class="title">
                سجل الطالب {{$student->name}}
            </span>
        </div>
    </div>
</div>
<a href="{{route('revisions.create', $student->id)}}" class="btn btn-primary">اضافة تسميع جديدة</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>السوره</th>
            <th>من</th>
            <th>الى</th>
            <th>نوع التسميعة</th>
            <!-- <th>العلامة</th> -->
            <th>ملاحظات</th>
            <th>التاريخ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($revisions as $revision)
        <tr>
            <td>
                {{config('swar')[$revision->soura-1]['name']}}
            <td>{{$revision->from}}</td>
            <td>{{$revision->to}}</td>
            <td>
                @if($revision->type == 1)
                <span class="badge badge-success">حفظ</span>

                @elseif($revision->type == 2)
                <span class="badge badge-info">تسميع</span>

                @elseif($revision->type == 3)
                <span class="badge badge-warning">مراجعة</span>

                @endif
            </td>
            <!-- <td>{{$revision->note}}</td> -->
            <td>{{$revision->description ? $revision->description : "---"}}</td>
            <td>
                <!-- format the date -->
                {{$revision->created_at->format('d-m-Y')}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
<div class="alert alert-warning">
    <strong>لا يوجد سجلات</strong>

</div>
<div class="row">
    <div class="col-md-3 m-3">
        <a href="{{route('revisions.create', $student->id)}}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            إضافة سجل
        </a>
    </div>
</div>
@endif


@endsection
