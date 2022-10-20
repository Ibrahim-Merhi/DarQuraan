<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- fontawesome and bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <title>
        @yield('title')
    </title>

    <style>
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            color: black !important;
            background-color: black;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        body {
            padding: 20px;

        }
    </style>
</head>

<body>
    <div id="app">
        @auth

        </head>

        <body>

            <div id="mySidenav" class="sidenav float-right">
                <a href="javascript:void(0)" class="closebtn hidden-prin" onclick="closeNav()">&times;</a>
                <a href="{{route('home')}}">
                    <i class="fas fa-home"></i>
                    <span>
                        الرئيسية
                    </span>
                </a>
                <a href="{{ route('students.index') }}">
                    <i class="fas fa-user"></i>
                    <span>
                        @if(@auth()->user()->group == 1)
                        الطلاب
                        @else
                        طلابي
                        @endif
                    </span>
                </a>

                <a href="{{ route('students.create') }}">
                    <i class="fas fa-user-plus"></i>
                    <span>
                        اضافة طالب

                    </span>
                </a>


                @if(auth()->user()->group == 1)
                <a href="{{ route('users.index') }}">
                    <i class="fas fa-users"></i>
                    <span>
                        المستخدمين
                    </span>
                </a>
                @endif
                @if(auth()->user()->group != 1)

                <a href="{{ route('time.index') }}">
                    <i class="fas fa-calendar"></i>
                    <span>
                        جدول التلاميذ
                    </span>
                </a>
                @endif
                <a href="{{ route('users.password',['id'=>auth()->user()->id]) }}">
                    <i class="fas fa-key"></i>
                    <span>
                        تغيير كلمة المرور
                    </span>
                </a>

                <a href="/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>
                        تسجيل الخروج
                    </span>

                </a>
            </div>


            <span style="font-size:30px;cursor:pointer " onclick="openNav()" class="hidden-print">
                <i class="ml-3 fas fa-bars"></i>
            </span>


            @endauth

            <main class="py-4">
                @yield('content')
            </main>
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>
