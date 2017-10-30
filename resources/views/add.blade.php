@extends('layouts.app')

//this will add laravel’s default navbar to your page

@section('content')
<div class="container">
                <h2>Add New Book</h2>

<form method="POST" action="/book">

    <div class="form-group">
        <input type="text" name="isbn" value="" placeholder="masukkan isbn" class="form-control">
    </div>
    <div class="form-group">
      <input type="text" name="nama_buku" value="" placeholder="masukkan nama buku" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="penerbit" value="" placeholder="masukkan penerbit" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="pengarang" value="" placeholder="masukkan pengarang" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="tahun" value="" placeholder="masukkan tahun" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Book</button>
    </div>
{{ csrf_field() }}
</form>


</div>
@endsection
