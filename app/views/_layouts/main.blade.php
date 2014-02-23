<!DOCTYPE html>
<html>
	<head>
		<!-- Untuk penerapan di semua jenis gadget & browser -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<!-- Informasi Umum -->
		<meta charset="utf-8" />
		<title>ImaGhost | Spread your images to the entire world.</title>
		<meta name="description" content="Another image hosting webpage with comments between member usability." />
		<meta name="keywords" content="image, hosting, picture, photo, imaghost, share, ..." />

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

		<!-- Font -->

		<!-- Koleksi CSS -->
		{{ HTML::style('assets/css/semantic.min.css') }}
		{{ HTML::style('assets/css/auth.css') }}

	</head>
	<body>

		@if(Auth::check())
			Selamat Datang, <a href="{{ route('beranda') }}">{{ Auth::user()->username }}</a><br/>
			<a href="{{ route('dashboard') }}">Dashboard</a><br/>
			<a href="{{ route('ganti-sandi') }}">Change Password</a><br/>
			<a href="{{ route('logout') }}">Logout</a><br/><br/>
		@else
			<a href="{{ route('beranda') }}">Login or Register Now</a><br/><br/>
		@endif

		{{-- Pesan-pesan --}}
		@if(Session::has('pesan'))
			<p>{{ Session::get('pesan') }}</p>
		@endif
		
		@yield('konten')
	
	</body>
</html>