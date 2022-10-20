@extends('layouts.app')

@section('title')
تغيير كلمة المرور
@endsection

@section('content')
<form action="{{route('users.change-password',['id'=> $user->id])}}" method="POST" class="p-3" autocomplete="off">
    @csrf

    <div class="row">
        <input autocomplete="false" name="hidden" type="text" style="display:none;">

        <div class="col-md-3 m-3">
            <div class="form-group">
                <label for="password" class="mb-3">كلمة المرور</label>
                <input type="password" class="form-control" name="password" id="password" required autocomplete="false" value="{{old('password')}}" placeholder="كلمة المرور">
            </div>
            @if ($errors->has('password'))
            <div class="col-md-3 m-3">
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
                @endif
            </div>
            <div class="col-md-3 m-3">
                <div class="form-group">
                    <label for="password_confirmation " class="mb-3">تأكيد كلمة المرور</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required autocomplete="off" placeholder="تأكيد كلمة المرور">
                </div>
            </div>
            @if ($errors->has('password_confirmation'))
            <div class="col-md-3 m-3">
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-3 mt-3 m-3">
                    <button type="submit" class="btn btn-primary">تغيير كلمة المرور</button>
                </div>
            </div>
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
</form>




@endsection

@section('scripts')
<script>
    //validate password
    $('#password').on('keyup', function() {

        var password = $('#password').val();
        var password_confirmation = $('#password_confirmation').val();
        if (password != password_confirmation) {
            $('#password_confirmation').addClass('is-invalid');
        } else {
            $('#password_confirmation').removeClass('is-invalid');
        }
    });
    //validate password_confirmation
    $('#password_confirmation').on('keyup', function() {

        var password = $('#password').val();
        var password_confirmation = $('#password_confirmation').val();
        if (password != password_confirmation) {
            $('#password_confirmation').addClass('is-invalid');
        } else {
            $('#password_confirmation').removeClass('is-invalid');
        }
    });
    //disable auto fill
    $('#password').on('keydown', function() {
        $('#password').removeClass('is-invalid');
    });
    $('#password_confirmation').on('keydown', function() {
        $('#password_confirmation').removeClass('is-invalid');
    });
</script>

@endsection
