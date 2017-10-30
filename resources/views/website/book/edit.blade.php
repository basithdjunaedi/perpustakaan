@extends('layouts.app')

//this will add laravel’s default navbar to your page

@section('content')
<div class="container">
	<h1>Edit the Book</h1>
  <form action="{{ route('books.update', $book->id) }}" method="post" >

    <div class="form-group">
        <label class="control-label" for="title">Masukkan ISBN</label>
        <input type="text" name="isbn" value="{{$book->isbn}}" placeholder="masukkan isbn" class="form-control">
        <span style="color:red;">{!! $errors->has('isbn')?$errors->first('isbn'):'' !!}</span>
    </div>
    <div class="form-group">
        <label class="control-label" for="title">Masukkan Nama</label>
      <input type="text" name="nama_buku" value="{{$book->nama_buku}}" placeholder="masukkan nama buku" class="form-control">
      <span style="color:red;">{!! $errors->has('nama_buku')?$errors->first('nama_buku'):'' !!}</span>
    </div>
    <div class="form-group">
        <label class="control-label" for="title">Masukkan Penerbit</label>
        <input type="text" name="penerbit" value="{{$book->penerbit}}" placeholder="masukkan penerbit" class="form-control">
        <span style="color:red;">{!! $errors->has('penerbit')?$errors->first('penerbit'):'' !!}</span>
    </div>
    <div class="form-group">
        <label class="control-label" for="title">Masukkan Pengarang</label>
        <input type="text" name="pengarang" value="{{$book->pengarang}}" placeholder="masukkan pengarang" class="form-control">
        <span style="color:red;">{!! $errors->has('pengarang')?$errors->first('pengarang'):'' !!}</span>
    </div>
    <div class="form-group">
        <label class="control-label" for="title">Masukkan Tahun</label>
        <input type="text" name="tahun" value="{{$book->tahun}}" placeholder="masukkan tahun" class="form-control">
        <span style="color:red;">{!! $errors->has('tahun')?$errors->first('tahun'):'' !!}</span>
    </div>
    <div class="form-group">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="put">
      <input class="btn btn-primary" type="submit" name="save" value="Save">
    </div>
</form>


</div>

@stop
