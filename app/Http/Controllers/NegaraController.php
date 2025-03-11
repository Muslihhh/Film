<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use Illuminate\Http\Request;

class negaracontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $negaras = Negara::all();
        return view('admin.negara.datanegara', compact('negaras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $negaras = Negara::all();
        return view('admin.negara.addnegara', compact('negaras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_negara' => 'required',
        ]);
        
        $negara = new Negara();
        $negara->nama_negara = $data['nama_negara'];
        $negara->save();

        return redirect()->route('negaras.index')->with('success', 'Negara berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Negara $negara)
    {
        $request->validate([
            'nama_negara' => 'required|string|max:255|unique:negara,nama_negara,' . $negara->id,
        ]);

        $negara->nama_negara = $request->input('nama_negara');
        $negara->save();
    
        return redirect()->route('negaras.index')->with('success', 'Negara berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $negara = Negara::find($id);
        $negara->delete();
        return redirect()->route('negaras.index')->with('success', 'negara berhasil dihapus');
    }
}
