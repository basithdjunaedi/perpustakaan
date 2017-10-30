@extends('layouts.app')

//this will add laravel’s default navbar to your page

@section('content')
<div class="container">
	<h1>Edit Member</h1>
  <form action="{{ route('members.update', $member->id) }}" method="post" >
    <div class="form-group">
      <label class="control-label" for="title">No KTP</label>
      <input type="text" name="no_ktp" value="{{$member->no_ktp}}" class="form-control" placeholder="Masukkan No. KTP">
      <span style="color:red;">{!! $errors->has('no_ktp')?$errors->first('no_ktp'):'' !!}</span>
    </div>
    <div class="form-group">
      <label class="control-label" for="title">Nama Lengkap</label>
      <input type="text" name="nama_lengkap" value="{{$member->nama_lengkap}}" class="form-control" placeholder="Masukkan Nama Lengkap">
      <span style="color:red;">{!! $errors->has('nama_lengkap')?$errors->first('nama_lengkap'):'' !!}</span>
    </div>
    <div class="form-group">
      <label class="control-label" for="title">Alamat</label>
      <input type="text" name="alamat" value="{{$member->alamat}}" class="form-control" placeholder="Masukkan Nama Alamat">
      <span style="color:red;">{!! $errors->has('alamat')?$errors->first('alamat'):'' !!}</span>
    </div>
    <div class="form-group">
      <label class="control-label" for="title">No HP</label>
      <input type="text" name="no_hp" value="{{$member->no_hp}}" class="form-control" placeholder="Masukkan No HP">
      <span style="color:red;">{!! $errors->has('no_hp')?$errors->first('no_hp'):'' !!}</span>
    </div>
    <div class="form-group">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="put">
      <input class="btn btn-primary" type="submit" name="save" value="Save">
    </div>
</form>


</div>

@stop
