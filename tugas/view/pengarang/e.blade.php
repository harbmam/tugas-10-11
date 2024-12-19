@extends('adminlte::page')
@section('title', 'Form Pengarang')
@section('content_header')
<h1>Data Pengarang</h1>
<br>
<a href="{{ route('pengarang.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')
{{-- Panggil master data pengarang, penerbit dan kategori untuk
ditampilkan di element form edit buku --}}
@php
$rs1 = App\Models\Pengarang::all();
$rs2 = App\Models\Penerbit::all();
$rs3 = App\Models\Kategori::all();
@endphp
@foreach($data as $p)
<form method="POST" action="{{ route('pengarang.update',$p->id) }}">

@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
@method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah
disetiap element form edit buku --}}

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" value="{{ $p->nama }}" class="form-control"/>
</div>

<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control" value="{{ $p->email }}" />
</div>

<div class="form-group">
<label>HP</label>
<input type="text" name="hp" class="form-control" value="{{ $p->hp }}" />
</div>

<div class="form-group">
<label>Foto</label>
<input type="file" name="foto" class="form-control" value="{{ $p->foto }}" />
</div>

<button type="submit" class="btn btn-primary"
name="proses">Ubah</button>
<button type="reset" class="btn btn-warning"
name="unproses">Batal</button>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop