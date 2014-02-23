@extends('_layouts.main')

@section('konten')
Beranda {{ $member->username }}, {{ $member->nama_awal }} {{ $member->nama_akhir }}
@stop