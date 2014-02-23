@extends('_layouts.main')

@section('konten')
Halaman Member {{ $member->username }}, {{ $member->nama_awal }} {{ $member->nama_akhir }}
@stop