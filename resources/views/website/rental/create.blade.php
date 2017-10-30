@extends('layouts.app')

//this will add laravel’s default navbar to your page
@section('css')
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
@endsection
@section('content')
<div class="container">
  <div class="panel-heading">
    <div class="panel-title">
      <h3>Rental Perpustakaan | Buat Rental</h3>
    </div>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="{{ route('rentals.store') }}" method="post" >
      <div class="form-group">
        <label class="control-label" for="scheduleTime">Waktu Rental</label>
        <div class='input-group date' id='datetimepicker1'>
          <input name="rental_date" placeholder="Masukkan Waktu Rental" type='text' class="form-control" />
          <span style="color:red;">{!! $errors->has('rental_date')?$errors->first('rental_date'):'' !!}</span>
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="scheduleTime">Waktu Pengembalian</label>
        <div class='input-group date' id='datetimepicker1'>
          <input name="return_date" placeholder="Masukkan Waktu Pengembalian" type='text' class="form-control" />
          <span style="color:red;">{!! $errors->has('return_date')?$errors->first('return_date'):'' !!}</span>
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="place">Nama Member</label>
        <select class="form-control" name="member_id">
          @foreach($members as $member)
          <option name="member_id" value="{{$member->id}}">{{$member->nama_lengkap}}</option>
          @endforeach
        </select>
        <span style="color:red;">{!! $errors->has('member_id')?$errors->first('member_id'):'' !!}</span>
      </div>
      <div class="form-group">
        <label class="control-label" for="place">Judul Buku</label>
        <select class="form-control" name="book_id">
          @foreach($books as $book)
          <option name="book_id" value="{{$book->id}}">{{$book->nama_buku}}</option>
          @endforeach
        </select>
        <span style="color:red;">{!! $errors->has('book_id')?$errors->first('book_id'):'' !!}</span>
      </div>
      <div class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input class="btn btn-primary" type="submit" name="save" value="Save">
      </div>
    </form>
  </div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$('#datetimepicker1').datetimepicker({
  format: 'YYYY-MM-DD HH:mm',
});
</script>
<script src="{{ asset('vendor/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js') }}"></script>
@endsection
