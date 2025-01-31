<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Tahun;
use App\Models\Negara;
use App\Models\Komentar;
use Illuminate\Http\Request;

class filmcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $films = Film::all();
    //     $genres = Genre::all();
    //     $komens = Komentar::all();
    //     $tahuns = Tahun::all();
    //     $negaras = Negara::all();
    //     return view('admin.film.datafilm', compact('films', 'genres', 'komens', 'tahuns', 'negaras'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $request->validate([
            'judul' => 'required|string',
            'id_genre' => 'required|integer',
            'id_tahun' => 'required|integer',
            'id_negara' => 'required|integer',
            'sinopsis' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'trailer' => 'required|mymetipes:video/mp4|max:10240',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
