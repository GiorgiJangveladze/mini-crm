<!DOCTYPE html>
<html lang="ge">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MINI CRM</title>
    @include('admin.partials.head')
</head>

<body class="skin-bluehold-transition skin-blue  sidebar-mini sidebar-open" style="height: auto; min-height: 100%;">
    
<!-- Site wrapper -->
    <div class="wrapper" style="overflow: hidden; height: auto; min-height: 100%;">

            <!-- Header container -->
            @include('admin.partials.header')

            <aside class="main-sidebar">
                <!-- Left side column. contains the logo and sidebar -->
                @include('admin.partials.sidebar')
            </aside>

           <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="min-height: 976px;">
                <section class="content-header">
                    @yield('content_header')
                </section>
                <section class="content">
                    @yield('content')
                </section>
            </div>
          
            @include('admin.partials.footer')
    </div>

<script src="{{asset('/js/app.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('adminTemplate/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('/adminTemplate/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('/alertifyjs/alertify.js')}}"></script>

@yield('scripts')
  
@include('admin.partials.message')

</body>
</html>