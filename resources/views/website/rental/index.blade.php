@extends('layouts.app')

@section('content')
<div class="container">
  @if(Session::has('flash_message'))
      <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
  @endif
  @if(Session::has('flash_message_delete'))
      <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
  @endif
                @if (Auth::check())
                        <h2>Riwayat Peminjaman</h2>
                        <a href="{{ route('rentals.create') }}" class="btn btn-primary">Tambah data</a>
                        <table class="table">
                            <thead><tr>
                              <th colspan="2">Tanggal Peminjaman</th>
                              <th colspan="2">Tanggal Pengembalian</th>
                              <th colspan="2">Nama Member</th>
                              <th colspan="2">Judul Buku</th>
                              <th colspan="2">Status</th>
                              <th colspan="2">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach($rental as $key => $rentals)
                            <tr>
                                <td colspan="2">
                                    {{$rentals->rental_date}}
                                </td>
                                <td colspan="2">
                                    {{$rentals->return_date}}
                                </td>
                                <td colspan="2">
                                    {{$rentals->member->nama_lengkap}}
                                </td>
                                <td colspan="2">
                                    {{$rentals->book->nama_buku}}
                                </td>
                                @if($rentals->status == 0)
                                <td>belum dikembalikan</td>
                                @else
                                <td>sudah dikembalikan</td>
                                @endif
                                <td colspan="2">
                                  <div class="btn-group">

                                    @if($rentals->status === 0)
                                    <button type="button" class="btn btn-success" onclick="event.preventDefault();document.getElementById('terima-form-{{$key}}').submit();"><i class="glyphicon glyphicon-ok"></i></button>
                                    <form id="terima-form-{{$key}}" action="{{ route('rentals.update', $rentals->id) }}" method="post" style="display: none;">
                                      <input type="hidden" name="_method" value="put">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                    @endif
                                    <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('tolak-form-{{$key}}').submit();"><i class="glyphicon glyphicon-remove"></i></button>
                                    <form id="tolak-form-{{$key}}" action="{{ route('rentals.destroy', $rentals->id) }}" method="post" style="display: none;">
                                      <input type="hidden" name="_method" value="delete">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                  </div>

                                </td>
                            </tr>



                        @endforeach</tbody>
                        </table>
                @else
                    <h3>You need to log in. <a href="{{ route('login') }}">Click here to login</a></h3>
                @endif

</div>
@endsection
<script src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
  setTimeout(function() {
          $('div.alert').fadeOut('fast');
        }, 5000);
</script>
