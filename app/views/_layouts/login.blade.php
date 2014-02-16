<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
{{-- Informasi Umum --}}
		<title>ImageHost</title>
		<meta name="description" content="Berbagi gambar dan dapatkan penilaian dari member lain." />
		<meta name="robots" content="noindex, nofollow" />
		<meta name="author" content="Noviyanto Rachmady" />
{{-- Icon Aplikasi --}}
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
{{-- Koleksi CSS --}}
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/plugins.css') }}
		{{ HTML::style('css/main.css') }}
		{{ HTML::style('css/themes.css') }}
{{-- Modernizr JS --}}
		{{ HTML::script('js/vendor/modernizr-2.7.1-respond-1.4.2.min.js') }}
	</head>
	<body>
		<div id="login-container">
			<div class="login-title text-center">
				<h1><i class="fa fa-camera-retro"></i> <strong>ImageHost</strong><br/><small>Berbagi Gambar Ke Seluruh Dunia</small></h1>
			</div>
			<div class="block remove-margin">

				@yield('login-form')
				
				@yield('register-form')

				@yield('forgot-form')

			</div>
		</div>
		
		@yield('modal-syarat')

{{-- Koleksi Javascript --}}
		{{ HTML::script('js/vendor/jquery-1.11.0.min.js') }}
		<script>!window.jQuery && document.write(unescape('%3Cscript src="{{ asset("js/vendor/jquery-1.11.0.min.js") }}"%3E%3C/script%3E'));</script>
		{{ HTML::script('js/vendor/bootstrap.min.js') }}
		{{ HTML::script('js/dev/plugins.js') }}
		{{ HTML::script('js/dev/app.js') }}
		{{ HTML::script('js/dev/login.js') }}
{{-- Enable fungsi login slider --}}
		<script>$(function(){Login.init();});</script>
	</body>
</html>