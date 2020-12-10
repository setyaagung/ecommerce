<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') | Aminous Indonesia</title>
        <meta name="description" content="@yield('meta_description')">
        <meta name="keyword" content="@yield('meta_keyword')">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="{{ asset('assets/frontend/css/mdb.min.css')}}" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="{{ asset('assets/frontend/css/style.css')}}" rel="stylesheet">
        <style>
            body{
                font-family: 'Poppins',sans-serif;
            }
            .sort-font{
                color: #262626;
                font-size: 15px;
                margin: 0 10px;
            }
        </style>
    </head>

    <body>
        @include('layouts.frontend.navbar')

        <main style="min-height: 410px">
            @yield('content')
        </main>

        @include('layouts.frontend.footer')
        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.min.js')}}"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ asset('assets/frontend/js/popper.min.js')}}"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.min.js')}}"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ asset('assets/frontend/js/mdb.min.js')}}"></script>
        <script>
            $(document).ready(function(){
                new WOW().init();
            });
        </script>
    </body>
</html>