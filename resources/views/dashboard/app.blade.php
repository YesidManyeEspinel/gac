<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title','Dashboard') | {{ config('app.name', 'Laravel') }}
        </title>

        <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    </head>
    <body>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
            </ul>
        </nav>
        <div class="container m-auto">          
            @yield('titlepage','Welcome')

            @yield('content','contenido')
        </div>
        
        @include('dashboard.footer')

        <!-- Scripts -->
        <script src="{{asset('js/jquery-3.5.1.js') }}"></script>
        <script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
        <section>
            @include('sweet::alert')
            @include('dashboard.error')
        </section>
        <script src="{{asset('bootstrap/js/bootstrap.js') }}"></script>
    </body>
</html>