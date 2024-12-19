@extends('adminlte::page')
@section('title', 'Data Mahasantri')
@section('content_header')
<h3> Data Mahasantri</h3>
<br/>
<a href="{{ route('mahasantri.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')
@php
$rs1 = App\Models\dosen::all();
$rs2 = App\Models\jurusan::all();
@endphp
@foreach($data AS $b) 
<form method="POST" action="{{ route('mahasantri.update',$b->id) }}">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
@method('put') 
<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" value="{{ $b->nama }}" />
</div>

<div class="form-group">
<label>NIM</label>
<input type="text" name="nim" class="form-control" value="{{ $b->nim }}" />
</div>

<div class="form-group">
<label>Dosen Pengajar</label>
<select class="form-control" name="dosen_id" >
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
<select class="form-control" name="jurusan_id" >
<option value="">-- Pilih Jurusan --</option>
@foreach($rs2 as $j)
@php
$sel2 = ($j->id == $b->jurusan_id) ? 'selected' : '';
@endphp
<option value="{{ $j->id }}" {{ $sel2 }}>{{ $j->nama }}</option>
@endforeach
</select>
</div>

<button type="submit" class="btn btn-primary"
name="proses">Simpan</button>
<button type="reset" class="btn btn-warning"
name="unproses">Batal</button>
@endforeach
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop