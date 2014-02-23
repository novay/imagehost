@extends('_layouts.main')

@section('konten')
<h1>Change Password</h1>
{{-- Pesan-pesan --}}
@if(Session::has('pesan'))
	<p>{{ Session::get('pesan') }}</p>
@endif
{{ Form::open(array('route' => 'post-ganti-sandi')) }}
	<!-- Grup Password Lama -->
	<div class="grup password_lama">
		{{ Form::label('password_lama', 'Old Password') }} : 
		{{ Form::password('password_lama') }}
		@if($errors->has('password_lama'))
			{{ $errors->first('password_lama') }}
		@endif
	</div>
	<!-- Grup Password -->
	<div class="grup password">
		{{ Form::label('password', 'New Password') }} : 
		{{ Form::password('password') }}
		@if($errors->has('password'))
			{{ $errors->first('password') }}
		@endif
	</div>
	<!-- Grup Password Lama -->
	<div class="grup konfirmasi_password">
		{{ Form::label('konfirmasi_password', 'Confirm Password') }} : 
		{{ Form::password('konfirmasi_password') }}
		@if($errors->has('konfirmasi_password'))
			{{ $errors->first('konfirmasi_password') }}
		@endif
	</div>
	<!-- Tombol Login -->
	{{ Form::submit('Change Password') }}
{{ Form::close() }}
@stop