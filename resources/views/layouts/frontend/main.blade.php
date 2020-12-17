<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') | Aminous Indonesia</title>
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <meta name="description" content="@yield('meta_description')">
        <meta name="keyword" content="@yield('meta_keyword')">
        <!-- Custom fonts for this template-->
        <link href="{{ asset('assets/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- Custom styles for this template-->
        <link href="{{ asset('assets/backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/backend/css/select2.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/backend/css/select2-bootstrap4.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/alertify.min.css')}}"/>
        <!-- Your custom styles (optional) -->
        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        @include('layouts.frontend.navbar')

        <main style="min-height: 418px">
            @yield('content')
        </main>

        @include('layouts.frontend.footer')
        <!-- SCRIPTS -->
        <script src="{{ asset('assets/backend/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('assets/backend/js/sb-admin-2.min.js')}}"></script>
        <script src="{{ asset('assets/backend/js/select2.full.min.js')}}"></script>
        <script src="{{ asset('assets/backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Page level custom scripts -->
        <script src="{{ asset('assets/backend/js/demo/datatables-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

        <script src="{{ asset('js/custom.js')}}"></script>
        <script src="{{ asset('js/alertify.min.js')}}"></script>
        <script>
            @error('email')
                $('#loginModal').modal('show');
            @enderror
            @if(session('status'))
                alertify.set('notifier','position','top-right');
                alertify.success('{{ session('status')}}')
            @endif
        </script>
    </body>
</html>