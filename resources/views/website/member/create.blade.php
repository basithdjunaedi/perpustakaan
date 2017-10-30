@extends('layouts.app')

//this will add laravel’s default navbar to your page

@section('content')
<div class="container">
  <div class="panel-heading">
    <div class="panel-title">
      <h3>Member Perpustakaan | Buat Member</h3>
    </div>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="{{ route('members.store') }}" method="post" >
      <div class="form-group">
        <label class="control-label" for="title">No KTP</label>
        <input type="text" name="no_ktp" value="" class="form-control" placeholder="Masukkan No. KTP">
        <span style="color:red;">{!! $errors->has('no_ktp')?$errors->first('no_ktp'):'' !!}</span>
      </div>
      <div class="form-group">
        <label class="control-label" for="title">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="" class="form-control" placeholder="Masukkan Nama Lengkap">
        <span style="color:red;">{!! $errors->has('nama_lengkap')?$errors->first('nama_lengkap'):'' !!}</span>
      </div>
      <div class="form-group">
        <label class="control-label" for="title">Alamat</label>
        <input type="text" name="alamat" value="" class="form-control" placeholder="Masukkan Nama Alamat">
        <span style="color:red;">{!! $errors->has('alamat')?$errors->first('alamat'):'' !!}</span>
      </div>
      <div class="form-group">
        <label class="control-label" for="title">No HP</label>
        <input type="text" name="no_hp" value="" class="form-control" placeholder="Masukkan No HP">
        <span style="color:red;">{!! $errors->has('no_hp')?$errors->first('no_hp'):'' !!}</span>
      </div>
      <div class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input class="btn btn-primary" type="submit" name="save" value="Save">
      </div>
    </form>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

@endsection
