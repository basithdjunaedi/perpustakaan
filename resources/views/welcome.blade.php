@extends('layouts.app')

@section('content')
<div class="container">
                @if (Auth::check())
                        <h2>Books List</h2>
                        <a href="/book" class="btn btn-primary">Add new Book</a>
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
                        <tbody>@foreach($user->books as $book)
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

                                    <form action="/book/{{$book->id}}">
                                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                        <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>


                        @endforeach</tbody>
                        </table>
                @else
                    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
                @endif

</div>
@endsection
