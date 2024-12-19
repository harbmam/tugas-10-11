@extends('adminlte::page')
@section('title', 'Data Mahasantri')
@section('content_header')
<h3> Data Mahasantri</h3>
<br/>
<a href="{{ route('mahasantri.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
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
$rs1 = App\Models\dosen::all();
$rs2 = App\Models\jurusan::all();
@endphp
@foreach($ar_mahasantri AS $b) 
<form method="POST" action="{{ route('mahasantri.store') }}">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" value="{{ $b->nama }}" disabled/>
</div>

<div class="form-group">
<label>NIM</label>
<input type="text" name="nim" class="form-control" value="{{ $b->nim }}" disabled/>
</div>

<div class="form-group">
<label>Dosen Pengajar</label>
<select class="form-control" name="dosen_id" disabled>
<option value="">-- Pilih Pengajar --</option>
@foreach($rs1 as $p)
@php
$sel1 = ($p->id == $b->dosen_id) ? 'selected' : '';
@endphp
<option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Jurusan</label>
<select class="form-control" name="jurusan_id" disabled>
<option value="">-- Pilih Jurusan --</option>
@foreach($rs2 as $j)
@php
$sel2 = ($j->id == $b->jurusan_id) ? 'selected' : '';
@endphp
<option value="{{ $j->id }}" {{ $sel2 }}>{{ $j->nama }}</option>
@endforeach
</select>
</div>
@endforeach
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop