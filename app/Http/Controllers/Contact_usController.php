<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact_us; 

class Contact_usController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Contact_us::all();
        return view('contact.index', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
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
            'alamat'        => 'required',
            'no_tel'        => 'required',
            'email'         => 'required'
        ]);
        $kontak = new Contact_us;
        $kontak->alamat = $request->alamat;
        $kontak->no_tel = $request->no_tel;
        $kontak->email  = $request->email;

        $kontak->save();
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak = Contact_us::FindOrFail($id);
        return view('contact.show', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = Contact_us::FindOrFail($id);
        return view('contact.edit', compact('kontak'));
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
            'alamat'        => 'required',
            'no_tel'        => 'required',
            'email'         => 'required'
        ]);
        $kontak = Contact_us::FindOrFail($id);
        $kontak->alamat = $request->alamat;
        $kontak->no_tel = $request->no_tel;
        $kontak->email  = $request->email;

        $kontak->save();
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontak = Contact_us::FindOrFail($id);
        $kontak->delete();
        return redirect()->route('contact.index');
    }
}
