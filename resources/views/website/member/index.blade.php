@extends('layouts.app')

//this will add laravel’s default navbar to your page

@section('content')
<div class="container">
                @if (Auth::check())
                        <h2>Members List</h2>
                        <a href="{{ route('members.create') }}" class="btn btn-primary">Add new member</a>
                        <table class="table">
                            <thead><tr>
                              <th colspan="2">No Ktp</th>
                              <th colspan="2">Nama Lengkap</th>
                              <th colspan="2">Alamat</th>
                                <th colspan="2">No HP</th>
                                <th colspan="2">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach($member as $key => $members)
                            <tr>
                                <td colspan="2">
                                    {{$members->no_ktp}}
                                </td>
                                <td colspan="2">
                                    {{$members->nama_lengkap}}
                                </td>
                                <td colspan="2">
                                    {{$members->alamat}}
                                </td>
                                <td colspan="2">
                                    {{$members->no_hp}}
                                </td>

                                <td colspan="2">
                                  <div class="btn-group">
                                    <a href="{{ route('members.edit', $members->id) }}" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>

                                    <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('tolak-form-{{$key}}').submit();"><i class="glyphicon glyphicon-remove"></i></button>
                                    <form id="tolak-form-{{$key}}" action="{{ route('members.destroy', $members->id) }}" method="post" style="display: none;">
                                      <input type="hidden" name="_method" value="delete">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                  </div>
                                </td>
                            </tr>


                        @endforeach</tbody>
                        </table>
                @else
                    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
                @endif

</div>
@endsection
