<?php

namespace App\Http\Controllers;
use App\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::all();
        return view ('kategori.index' , compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama_kategori'=> 'required',
        ]);
        kategori::create($request->all());
        return redirect()->route('kategori.index')->with('succes', 'kategori berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($kategori_id)
    {
    $kategori = kategori::findOrFail($kategori_id);
    return view('kategori.edit', compact('kategori'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kategori_id)
    {
    $request->validate([
        'nama_kategori' => 'required',
    ]);

    $kategori = kategori::findOrFail($kategori_id);
    $kategori->update($request->all());

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($kategori_id)
    {
    $kategori = kategori::findOrFail($kategori_id);
    $kategori->delete();
    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
    