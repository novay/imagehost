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
{{-- ##### Form Login ##### --}}
				{{ Form::open(array('route'=>'beranda', 'id'=>'form-login', 'class'=>'form-horizontal form-control-borderless')) }}
{{-- Bila user dan password tidak valid tampilkan error --}}
					@if(Session::has('error'))
						<div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="fa fa-exclamation-circle"></i> Ups, {{ Session::get('error') }}
						</div>
					@endif
{{-- Grup Username --}}
					<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
								{{ Form::text('username', Input::old('username'), array(
									'class'=>'form-control input-lg', 
									'placeholder'=>'Username')) }}
							</div>
							{{ $errors->has('username') ? 
								'<span class="help-block animation-slideDown small text-center">'
									 . $errors->first('username') . 
								'</span>' : '' }}
						</div>
					</div>
{{-- Grup Password --}}
					<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								{{ Form::password('password', array(
									'class'=>'form-control input-lg', 
									'placeholder'=>'Pasword')) }}
							</div>
							{{ $errors->has('password') ? 
								'<span class="help-block animation-slideDown small text-center">'
									 . $errors->first('password') . 
								'</span>' : '' }}
						</div>
					</div>
{{-- Grup Ingatkan Saya --}}
					<div class="form-group form-actions">
						<div class="col-xs-3 text-center">
							<label class="switch switch-primary" data-toggle="tooltip" title="Ingatkan Saya?">
								{{ Form::checkbox('ingat') }} <span></span>
							</label>
						</div>
{{-- Tombol Login --}}
						<div class="col-xs-9 text-right">
							{{ Form::submit('Masuk Beranda', array('class'=>'btn btn-sm btn-primary')) }}
						</div>
					</div>
{{-- Peralihan Pendaftaran --}}
					<div class="form-group">
						<div class="col-xs-12">
							<p class="text-right remove-margin"><small>Anda belum memiliki akun?</small>
								<a href="javascript:void(0)" id="link-login"><small>Buat secara gratis!</small></a>
							</p>
						</div>
					</div>
				{{ Form::close() }}
				
{{-- ##### Form Register ##### --}}
				<form action="#" method="post" id="form-register" class="form-horizontal form-control-borderless display-none">
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="gi gi-user"></i></span>
								<input type="text" id="register-username" name="register-username" class="form-control input-lg" placeholder="Nama Lengkap" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
								<input type="text" id="register-email" name="register-email" class="form-control input-lg" placeholder="Surel atau Email" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span></span>
								<input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="Kata Sandi" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-key"></i></span></span>
								<input type="password" id="register-password-verify" name="register-password-verify" class="form-control input-lg" placeholder="Ulangi Kata Sandi" />
							</div>
						</div>
					</div>
					<div class="form-group form-actions">
					<div class="col-xs-6">
						<a href="#modal-terms" data-toggle="modal" class="register-terms">Syarat &amp; Ketentuan</a>
						<label class="switch switch-primary" data-toggle="tooltip" title="Setujui">
							<input type="checkbox" id="register-terms" name="register-terms" />
							<span></span>
						</label>
					</div>
						<div class="col-xs-6 text-right">
							<button type="submit" class="btn btn-sm btn-primary">Daftar Akun</button>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<p class="text-right remove-margin">
								<small>Ups, Anda telah memiliki akun?</small> 
								<a href="javascript:void(0)" id="link-register"><small>Masuk!</small></a>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
		
{{-- Modal Persyaaten --}}
		<div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Syarat &amp; Ketentuan</h4>
				</div>
				<div class="modal-body">
					<h4>Sekedar Formalitas</h4>
					<p>Situs ini masih dalam tahap pengembangan, bila ingin menggunakannya silahkan lakukan pendaftaran terlebih dahulu.</p>
					<p>Harap diketahui, saya sebagai developer situs tidak bertanggung jawab atas keseluruhan isi yang ada dalam situs ini, semua resiko ditanggung oleh masing-masing member terkait dengan gambar yang mereka unggah kedalam sistem.</p>
					<p>Untuk penjelasan lengkapnya, akan saya lengkapi setelah proyek pengembangan situs ini selesai. Terima kasih!</p>
					<br/>
					<p class="text-right"><i class="fa fa-github-alt"></i> Noviyanto Rachmady</p>
					</div>
				</div>
			</div>
		</div>		
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