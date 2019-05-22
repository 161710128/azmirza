<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;
use File;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::all();
        return view('career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('career.create');
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
            'nama'      => 'required',
            'email'     => 'required',
            'no_tel'    => 'required',
            'cv'        => 'required|file|mimes:doc,txt,pdf,docx|max:2048',
            'subyek'    => 'required',
            'deskripsi' => 'required'
        ]);

        $careers = new Career;
        $careers->nama      = $request->nama;
        $careers->email     = $request->email;
        $careers->no_tel    = $request->no_tel;
        $careers->cv        = $request->cv;
        $careers->subyek    = $request->subyek;
        $careers->deskripsi  = $request->deskripsi;

        if ($request->hasFile('cv')){
            $file = $request->file('cv');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $careers->cv = $filename;
        }
        $careers->save();
        return redirect()->route('career.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $careers = Career::FindOrFail($id);
        return view('career.show', compact('careers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $careers = Career::FindOrFail($id);
        return view('career.edit', compact('careers'));
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
            'nama'      => 'required',
            'email'     => 'required',
            'no_tel'    => 'required',
            'cv'        => 'required|',
            'subyek'    => 'required',
            'deskripsi' => 'required'
        ]);
        $careers = new Career;
        $careers->nama      = $request->nama;
        $careers->email     = $request->email;
        $careers->no_tel    = $request->no_tel;
        $careers->cv        = $request->cv;
        $careers->subyek    = $request->subyek;
        $careers->deskripsi  = $request->deskripsi;

        if ($request->hasFile('cv')){
            $file = $request->file('cv');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $careers->cv = $filename;

            if ($careers->cv) {
                $old_cv = $careers->cv; 
                $filepath = public_path() .  DIRECTORY_SEPARATOR . '/assets/img/gambar/'
                . DIRECTORY_SEPARATOR . $careers->cv;
                try {
                    File::delete($filepath);
                } catch (FileNotException $e) {
                    // File sudah dihapus/tidak ada 
                }
            }
            $careers->cv = $filename;
        }
        $careers->save();
        return redirect()->route('career.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $careers =Career::FindOrFail($id);
        if ($careers->cv) {
            $old_cv = $careers->cv; 
            $filepath = public_path() .  DIRECTORY_SEPARATOR . '/assets/files'
            . DIRECTORY_SEPARATOR . $careers->gambar;
            try {
                File::delete($filepath);
            } catch (FileNotException $e) {
                // File sudah dihapus/tidak ada 
            }
        }
        $careers->delete();
        return redirect()->route('career.index');
    }
}
