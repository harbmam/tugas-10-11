@extends('adminlte::page')
@section('title', 'Data Pengarang')
@section('content_header')
<h1>Data Pengarang</h1>
<br/>
<a href="{{ route('pengarang.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')

@php
$rs1 = App\Models\Pengarang::all();
$rs2 = App\Models\Penerbit::all();
$rs3 = App\Models\Kategori::all();
@endphp

@foreach($ar_pen as $p)
<form method="POST" action="{{ route('pengarang.store') }}">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
<br>
<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" value="{{ $p->nama }}" disabled/>
</div>

<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control" value="{{ $p->email }}" disabled/>
</div>

<div class="form-group">
<label>HP</label>
<input type="text" name="hp" class="form-control" value="{{ $p->hp }}" disabled/>
</div>

<div class="form-group">
<label>Foto</label>
<img src="{{ $p->foto }}" name="foto" class="form-control" disabled/>
</div>

@endforeach 
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop