<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Auth;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all();
        return view('website.member.index',compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.member.create');
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
        'no_ktp' => 'required',
        'nama_lengkap' => 'required',
        'alamat' => 'required',
        'no_hp'=> 'required',
      ]);
      $member = new Member;
      $member->no_ktp = $request->no_ktp;
      $member->nama_lengkap = $request->nama_lengkap;
      $member->alamat = $request->alamat;
      $member->no_hp = $request->no_hp;
      $member->save();
       \Session::flash('flash_message','Data berhasil ditambahkan');
      return redirect('member');
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
      if (Auth::check()) {
        $member = Member::find($id);
        return view('website.member.edit',compact('member'));
      }else {
        return redirect('/');
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'no_ktp' => 'required',
        'nama_lengkap' => 'required',
        'alamat' => 'required',
        'no_hp'=> 'required',
      ]);

      $members = Member::find($id);
      $memberUpdate = $request->all();
      $members->update($memberUpdate);
      return redirect('member');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
      $member->delete();
      \Session::flash('flash_message_delete','Member berhasil dihapus.');
       return redirect('member');
    }
}
