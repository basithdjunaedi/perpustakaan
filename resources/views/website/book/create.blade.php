@extends('layouts.app')

//this will add laravel’s default navbar to your page

@section('content')
<div class="container">
  <div class="panel-heading">
    <div class="panel-title">
      <h3>  Buku Perpustakaan | Buat Buku</h3>
    </div>
  </div>
  <div class="panel-body">

<form method="POST" action="{{ route('books.store') }}">

    <div class="form-group">
        <label class="control-label" for="title">Masukkan ISBN</label>
        <input type="text" name="isbn" value="" placeholder="masukkan isbn" class="form-control">
        <span style="color:red;">{!! $errors->has('isbn')?$errors->first('isbn'):'' !!}</span>
    </div>
    <div class="form-group">
        <label class="control-label" for="title">Masukkan Nama</label>
      <input type="text" name="nama_buku" value="" placeholder="masukkan nama buku" class="form-control">
      <span style="color:red;">{!! $errors->has('nama_buku')?$errors->first('nama_buku'):'' !!}</span>
    </div>
    <div class="form-group">
        <label class="control-label" for="title">Masukkan Penerbit</label>
        <input type="text" name="penerbit" value="" placeholder="masukkan penerbit" class="form-control">
        <span style="color:red;">{!! $errors->has('penerbit')?$errors->first('penerbit'):'' !!}</span>
    </div>
    <div class="form-group">
        <label class="control-label" for="title">Masukkan Pengarang</label>
        <input type="text" name="pengarang" value="" placeholder="masukkan pengarang" class="form-control">
        <span style="color:red;">{!! $errors->has('pengarang')?$errors->first('pengarang'):'' !!}</span>
    </div>
    <div class="form-group">
        <label class="control-label" for="title">Masukkan Tahun</label>
        <input type="text" name="tahun" value="" placeholder="masukkan tahun" class="form-control">
        <span style="color:red;">{!! $errors->has('tahun')?$errors->first('tahun'):'' !!}</span>
    </div>
    <div class="form-group">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input class="btn btn-primary" type="submit" name="save" value="Save">
    </div>
</form>
</div>
@endsection
