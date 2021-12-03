<?php

namespace App\Http\Controllers;

use App\Models\rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rayon = rayon::latest()->paginate(5);

        return view('rayon.index',compact('rayon'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rayon.create');
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
            'rayon'=>'required',
            'pembimbing_rayon'=>'required'
        ]);

        rayon::create($request->all());
        return redirect()->route('rayon.index')
                        ->with('success', 'berhasil menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function show(rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit(rayon $rayon)
    {
        return view('rayon.edit', compact('rayon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rayon $rayon)
    {
        
        $request->validate([
            'rayon'=>'required',
            'pembimbing_rayon'=>'required'
        ]);

        $rayon->update($request->all());
        return redirect()->route('rayon.index')
                        ->with('success', 'berhasil update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(rayon $rayon)
    {
        
        $rayon->delete();

        return redirect()->route('rayon.index')
                        ->with('success', 'berhasil hapus!');
    }
}
