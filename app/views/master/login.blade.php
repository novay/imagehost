@extends('_layouts.login')

@section('login-form')
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
@stop

@section('register-form')
{{-- ##### Form Register ##### --}}
	{{ Form::open(array('route'=>'daftar', 'id'=>'form-register', 'class'=>'form-horizontal form-control-borderless display-none')) }}
		<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
			<div class="col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="gi gi-user"></i></span>
					{{ Form::text('username', Input::old('username'), array('class'=>'form-control input-lg', 'placeholder'=>'Username Baru')) }}
				</div>
				{{ $errors->has('username') ? 
					'<span class="help-block animation-slideDown small text-center">'
						 . $errors->first('username') . 
					'</span>' : '' }}
			</div>
		</div>
		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			<div class="col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
					{{ Form::text('email', Input::old('email'), array('class'=>'form-control input-lg', 'placeholder'=>'Email')) }}
				</div>
				{{ $errors->has('email') ? 
					'<span class="help-block animation-slideDown small text-center">'
						 . $errors->first('email') . 
					'</span>' : '' }}
			</div>
		</div>
		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			<div class="col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span></span>
					{{ Form::password('password', array('class'=>'form-control input-lg', 'placeholder'=>'Kata Sandi')) }}
				</div>
				{{ $errors->has('password') ? 
					'<span class="help-block animation-slideDown small text-center">'
						 . $errors->first('password') . 
					'</span>' : '' }}
			</div>
		</div>
		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			<div class="col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key"></i></span></span>
					{{ Form::password('ulang_password', array('class'=>'form-control input-lg', 'placeholder'=>'Ulangi Kata Sandi')) }}
				</div>
				{{ $errors->has('ulang_password') ? 
					'<span class="help-block animation-slideDown small text-center">'
						 . $errors->first('ulang_password') . 
					'</span>' : '' }}
			</div>
		</div>
		<div class="form-group form-actions">
		<div class="col-xs-8">
			<div class="animation-slideDown small">Dengan mendaftar berarti Anda menyetujui  
				<a href="#modal-terms" data-toggle="modal" class="register-terms">Syarat &amp; Ketentuan</a>
			</div>
		</div>
			<div class="col-xs-4 text-right">
				{{ Form::submit('Daftar Akun', array('class' => 'btn btn-sm btn-primary')) }}
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
	{{ Form::close() }}
@stop

@section('modal-syarat')
{{-- Modal Persyaaten --}}
	<div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Syarat &amp; Ketentuan</h4>
			</div>
			<div class="modal-body">
				<p>Situs ini masih dalam tahap pengembangan, bila ingin menggunakannya silahkan lakukan pendaftaran terlebih dahulu.</p>
				<p>Harap diketahui, saya sebagai developer situs tidak bertanggung jawab atas keseluruhan isi yang ada dalam situs ini, semua resiko ditanggung oleh masing-masing member terkait dengan gambar yang mereka unggah kedalam sistem.</p>
				<p>Untuk penjelasan lengkapnya, akan saya lengkapi setelah proyek pengembangan situs ini selesai. Terima kasih!</p>
				<br/>
				<a href="http://novay.web.id/" target="_blank"><p class="text-right"><i class="fa fa-github-alt"></i> Noviyanto Rachmady</p></a>
				</div>
			</div>
		</div>
	</div>		
@stop