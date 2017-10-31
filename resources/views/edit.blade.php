@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Edit the Book</h1>

<form method="POST" action="/book/{{ $book->id }}">

  <div class="form-group">
      <input type="text" name="isbn" value="{{$book->isbn}}" placeholder="masukkan isbn" class="form-control">
  </div>
  <div class="form-group">
    <input type="text" name="nama_buku" value="{{$book->nama_buku}}" placeholder="masukkan nama buku" class="form-control">
  </div>
  <div class="form-group">
      <input type="text" name="penerbit" value="{{$book->penerbit}}" placeholder="masukkan penerbit" class="form-control">
  </div>
  <div class="form-group">
      <input type="text" name="pengarang" value="{{$book->pengarang}}" placeholder="masukkan pengarang" class="form-control">
  </div>
  <div class="form-group">
      <input type="text" name="tahun" value="{{$book->tahun}}" placeholder="masukkan tahun" class="form-control">
  </div>


	<div class="form-group">
		<button type="submit" name="update" class="btn btn-primary">Update Book</button>
	</div>
{{ csrf_field() }}
</form>



</div>

@stop
