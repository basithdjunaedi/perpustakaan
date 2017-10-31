<?php

namespace App\Http\Controllers;
use App\Rental;
use App\Book;
use App\Member;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $rental = Rental::all();
       $book = Book::all();
       $member = Member::all();
       return view('website.rental.index',compact('rental','book','member'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $books = Book::all();
      $members = Member::all();
      return view('website.rental.create',compact('books','members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'rental_date' => 'required',
        'return_date' => 'required',
        'member_id' => 'required',
        'book_id'=> 'required',
      ]);
      $rental = new Rental;
      $rental->rental_date = $request->rental_date;
      $rental->return_date = $request->return_date;
      $rental->member_id = $request->member_id;
      $rental->book_id = $request->book_id;
      $rental->status = 0;
      $rental->save();
      \Session::flash('flash_message','Data berhasil ditambahkan');
      return redirect('rental');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Rental $rental)
     {
       $rental->status = $rental->status ? 0 : 1;
       $rental->save();
       // return $guest;
       return redirect('rental');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
      $rental->delete();
      \Session::flash('flash_message_delete','Data berhasil dihapus.');
       return redirect('rental');
    }
}
