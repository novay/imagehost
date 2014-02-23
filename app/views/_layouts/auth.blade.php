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
		{{-- Pesan-pesan --}}
		@if(Session::has('pesan'))
			<p>{{ Session::get('pesan') }}</p>
		@endif

		<!-- Deskripsi Judul dan Slogan -->
		<h1 class="judul">{{ Situs::data()->nama }}</h1>
		<p class="keterangan">{{ Situs::data()->slogan }}</p>

		<h2 class="tanya">Need an image hosting</h2>
		<p class="jawab">I think, you've come to the right place.</p>

		<h2 class="tanya">What's you get</h2>
		<p class="jawab">Host an image, get the grade.</p>

		<h2 class="tanya">Who you are</h2>
		<p class="jawab">Being an appraiser, comment friend's stuff.</p>

		<!-- Halaman Login -->
		<h1>Let's get started</h1>
		{{ Form::open(array('route' => 'beranda-masuk')) }}
			<!-- Grup Username -->
			<div class="grup username">
				{{ Form::label('username', 'Username') }} : 
				{{ Form::text('username', e(Input::old('username'))) }}
				@if($errors->has('username'))
					{{ $errors->first('username') }}
				@endif
			</div>
			<!-- Grup Password -->
			<div class="grup password">
				{{ Form::label('password', 'Password') }} : 
				{{ Form::password('password') }}
				@if($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
			</div>
			<!-- Grup Ingatkan Saya -->
			<div class="grup ingat">
				<input type="checkbox" name="ingat" id="ingat"> 
				{{ Form::label('ingat', 'Remember Me') }}
			</div>
			<!-- Tombol Login -->
			{{ Form::submit('Login') }}
		{{ Form::close() }}

		<!-- Halaman Pendaftaran -->
		<h1>Register in a minutes</h1>
		{{ Form::open(array('route' => 'beranda-daftar')) }}
			<!-- Grup Nama -->
			<div class="grup nama">
				<div class="nama_awal">
					{{ Form::label('nama_awal', 'First Name') }} : 
					{{ Form::text('nama_awal', e(Input::old('nama_awal'))) }}
					@if($errors->has('nama_awal'))
						{{ $errors->first('nama_awal') }}
					@endif
				</div>
				<div class="nama_akhir">
					{{ Form::label('nama_akhir', 'Last Name') }} : 
					{{ Form::text('nama_akhir', e(Input::old('nama_akhir'))) }}
					@if($errors->has('nama_akhir'))
						{{ $errors->first('nama_akhir') }}
					@endif
				</div>
			</div>
			<!-- Grup Email -->
			<div class="grup d_email">
				{{ Form::label('d_email', 'Email') }} : 
				{{ Form::text('d_email', e(Input::old('email'))) }}
				@if($errors->has('d_email'))
					{{ $errors->first('d_email') }}
				@endif
			</div>
			<!-- Grup Username -->
			<div class="grup d_username">
				{{ Form::label('d_username', 'Username') }} : 
				{{ Form::text('d_username', e(Input::old('username'))) }}
				@if($errors->has('d_username'))
					{{ $errors->first('d_username') }}
				@endif
			</div>
			<!-- Grup Password -->
			<div class="grup d_password">
				{{ Form::label('d_password', 'Password') }} : 
				{{ Form::password('d_password') }}
				@if($errors->has('d_password'))
					{{ $errors->first('d_password') }}
				@endif
			</div>
			<!-- Grup Konfirmasi Password -->
			<div class="grup konfirmasi_password">
				{{ Form::label('konfirmasi_password', 'Confirm Password') }} : 
				{{ Form::password('konfirmasi_password') }}
				@if($errors->has('konfirmasi_password'))
					{{ $errors->first('konfirmasi_password') }}
				@endif
			</div>
			<!-- Grup Setuju -->
			<div class="grup setuju">
				{{ Form::checkbox('setuju') }} 
				<a href="#">{{ Form::label('setuju', 'Agree terms &amp; conditions') }}</a>
				@if($errors->has('setuju'))
					{{ $errors->first('setuju') }}
				@endif
			</div>
			<!-- Tombol Daftar -->
			{{ Form::submit('Register') }}
		{{ Form::close() }}

		<!-- Halaman Pengingat Sandi -->
		<h1>Send me a new password</h1>
		{{ Form::open(array('route' => 'beranda-lupa-password')) }}
			<!-- Grup Email -->
			<div class="grup i_email">
				{{ Form::label('i_email', 'Email') }} : 
				{{ Form::text('i_email', Input::old('i_email')) }}
				@if($errors->has('i_email'))
					{{ $errors->first('i_email') }}
				@endif
			</div>
			<!-- Tombol Pengingat -->
			{{ Form::submit('Recover') }}
		{{ Form::close() }}

		<!-- Modal Terms & Conditions -->
		<h1>Syarat &amp; Ketentuan</h1>
		<p>Situs ini masih dalam tahap pengembangan, bila ingin menggunakannya silahkan lakukan pendaftaran terlebih dahulu.</p>
		<p>Harap diketahui, saya sebagai developer situs tidak bertanggung jawab atas keseluruhan isi yang ada dalam situs ini, semua resiko ditanggung oleh masing-masing member terkait dengan gambar yang mereka unggah kedalam sistem.</p>
		<p>Untuk penjelasan lengkapnya, akan saya lengkapi setelah proyek pengembangan situs ini selesai. Terima kasih!</p>
		Salam hormat, <a href="http://novay.web.id/" target="_blank"><p class="text-right"><i class="fa fa-github-alt"></i> Noviyanto Rachmady</p></a>	
		<h1>Terms &amp; Conditions</h1>
		<p>This site is under development, but if you want to use this system now, you can get it through the register in here for free.</p>
		<p>For the attention, me or myself as a developer for this site is fully not resposible for all of content in this site, all the risk is borne by each member associated by the images that they uploaded into the system.</p>
		<p>For the full explanation, I will proceed once the project is completed. Thank you!</p>
		Best Regard, <a href="http://novay.web.id/" target="_blank"><p class="text-right"><i class="fa fa-github-alt"></i> Noviyanto Rachmady</p></a>	

		<!-- Catatan Kaki -->
		<p>Copyright &copy; <a href="#">Noviyanto Rachmady</a>. Some right reserved. Powered by <a href="#">Laravel</a> &amp; <a href="#">Semantic UI</a></p>
		
		<!-- Koleksi JS -->
		{{ HTML::script('assets/js/semantic.min.js') }}
		{{ HTML::script('assets/js/jquery-latest.min.js') }}
		{{ HTML::script('assets/js/auth.js') }}
	</body>
</html>