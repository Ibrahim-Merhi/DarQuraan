@extends('layouts.app')

@section('title')
الرئيسية

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('عدد الطلاب') }}</div>
                <div>
                    <div class="m-3 alert alert-success">
                        عدد الطلاب : {{$users}}
                    </div>
                    @if(auth()->user()->group!= 1)

                    <div class="m-3 alert alert-success">
                        <a href="{{route('time.index')}}">
                            مواعيد اليوم : {{$today_user}}

                        </a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
