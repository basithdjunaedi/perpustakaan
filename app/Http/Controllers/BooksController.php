<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Book;

class BooksController extends Controller
{

    public function index()
    {
      $user = Auth::user();
      $books = Book::all();
      return view('website.book.index', compact('user','books'));
    }

    public function create()
    {
      // return'tes';
      return view('website.book.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'isbn' => 'required',
        'nama_buku' => 'required',
        'penerbit' => 'required',
        'pengarang'=> 'required',
        'tahun'=> 'required',
      ]);
      $book = new Book();
      $book->isbn = $request->isbn;
      $book->nama_buku = $request->nama_buku;
      $book->penerbit = $request->penerbit;
      $book->pengarang = $request->pengarang;
      $book->tahun = $request->tahun;
      $book->user_id = Auth::id();
      $book->save();
      return redirect('book');
    }

    public function edit($id)
    {
      if (Auth::check()) {
        $book = Book::find($id);
        return view('website.book.edit',compact('book'));
      }else {
        return redirect('/');
      }
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'isbn' => 'required',
        'nama_buku' => 'required',
        'penerbit' => 'required',
        'pengarang'=> 'required',
        'tahun'=> 'required',
      ]);

      $books = Book::find($id);
      $bookUpdate = $request->all();
      $books->update($bookUpdate);
      return redirect('book');
    }

    public function show($id)
    {
        //
    }

    public function destroy(Book $book)
    {
      $book->delete();
       return redirect('book');
    }
}
