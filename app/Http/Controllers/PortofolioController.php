<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\portofolio;
use File;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('portofolio.index', compact('portofolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portofolio.create');
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
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $portofolios = new Portofolio;
        $portofolios->judul = $request->judul;
        $portofolios->deskripsi = $request->deskripsi;
        $portofolios->gambar = $request->gambar;
        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assetss/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $portofolios->gambar = $filename;
        }
        
        $portofolios->save();
        return redirect()->route('portofolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portofolios = Portofolio::FindOrFail($id);
        return view('portofolio.show', compact('portofolios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portofolios = Portofolio::FindOrFail($id);
        return view('portofolio.edit', compact('portofolios'));
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
            'judul'      => 'required|max:225',
            'gambar'     => '',
            'deskripsi' => 'required'
        ]);

        $portofolios = new Portofolio;
        $portofolios->judul      = $request->judul;
        $portofolios->gambar     = $request->gambar;
        $portofolios->deskripsi    = $request->deskripsi;

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assetss/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $portofolios->gambar = $filename;

            if ($portofolios->gambar) {
                $old_file = $portofolios->gambar; 
                $filepath = public_path() .  DIRECTORY_SEPARATOR . '/assetss/img/gambar/'
                . DIRECTORY_SEPARATOR . $portofolios->gambar;
                try {
                    File::delete($filepath);
                } catch (FileNotException $e) {
                    // File sudah dihapus/tidak ada 
                }
            }
            $portofolios->gambar = $filename;
        }
            $portofolios->save();
            return redirect()->route('portofolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portofolios = Portofolio::FindOrFail($id);
        if ($portofolios->gambar) {
            $old_foto = $portofolios->gambar;
                $filepath = public_path(). DIRECTORY_SEPARATOR . 'assetss/img/gambar/' . DIRECTORY_SEPARATOR . $portofolios->gambar;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e){
                    // file sudah dihapus
                }
        }
        $portofolios->delete();
        return redirect()->route('portofolio.index');
    }
}
