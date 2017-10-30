@extends('layouts.app')

//this will add laravel’s default navbar to your page

@section('content')
<div class="container">
                @if (Auth::check())
                        <h2>Books List</h2>
                        <a href="{{ route('books.create') }}" class="btn btn-primary">Add new Book</a>
                        <table class="table">
                            <thead><tr>
                              <th colspan="2">ISBN</th>
                              <th colspan="2">Nama Buku</th>
                              <th colspan="2">Penerbit</th>
                                <th colspan="2">Pengarang</th>
                                <th colspan="2">Tahun</th>
                                <th colspan="2">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach($books as $key => $book)
                            <tr>
                                <td colspan="2">
                                    {{$book->isbn}}
                                </td>
                                <td colspan="2">
                                    {{$book->nama_buku}}
                                </td>
                                <td colspan="2">
                                    {{$book->penerbit}}
                                </td>
                                <td colspan="2">
                                    {{$book->pengarang}}
                                </td>
                                <td colspan="2">
                                    {{$book->tahun}}
                                </td>
                                <td colspan="2">
                                  <div class="btn-group">
                                    <a href="{{ route('books.edit', $book->id) }}" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                    <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('tolak-form-{{$key}}').submit();"><i class="glyphicon glyphicon-remove"></i></button>
                                    <form id="tolak-form-{{$key}}" action="{{ route('books.destroy', $book->id) }}" method="post" style="display: none;">
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
