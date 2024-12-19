@extends('adminlte::page')
@section('title', 'Data Pengarang')
@section('content_header')
<h3> Data Pengarang</h3>
<br/>
<a href="{{ route('pengarang.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
@php
$rs1 = App\Models\Pengarang::all();
$rs2 = App\Models\Penerbit::all();
$rs3 = App\Models\Kategori::all();
@endphp
<form method="POST" action="{{ route('pengarang.store') }}">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control"/>
</div>

<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control"/>
</div>

<div class="form-group">
<label>HP</label>
<input type="text" name="hp" class="form-control"/>
</div>

<div class="form-group">
<label>Foto</label>
<input type="file" name="foto" class="form-control"/>
</div>
<button type="submit" class="btn btn-primary"
name="proses">Simpan</button>
<button type="reset" class="btn btn-warning"
name="unproses">Batal</button>
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop