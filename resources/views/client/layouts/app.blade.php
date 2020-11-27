<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
</head>
<body>
	@include('client.partials.preload')
	<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
				</a>
				@if (Auth::guest())
					<a href="{{ url('/login') }}">
						Login
					</a>
				@else 
					<a href="{{ route('admin') }}">
						Dashboard
					</a>
				@endif
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
	</div>
	
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{asset('assets/js/main.js')}}"></script>
	
	

	@yield('scripts')
</body>
</html>
