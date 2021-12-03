<?php

namespace App\Http\Controllers;

use App\Models\ket;
use Illuminate\Http\Request;

class KetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ket=ket::all();        
        return view('kets/index', compact('ket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kets.create');
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
            'nama'=>'required',
            'nis'=>'required',
            'ket'=>'required',
            'foto'=>'image|file|max:2048|mimes:jpg,png,jpeg'
        ]);

        $imgName=null;
        if($request->foto){
            $imgName=$request->foto->getClientOriginalName() .'-' . time(). '-' . $request->foto->extension();    
            
            //$imgName=$request->foto->getClientOriginalName();
            $request->foto->move(public_path('post-images'),$imgName);
        }


        //produsen::create($request->all());
        ket::create([
            'nama'=>$request['nama'],
            'nis'=>$request['nis'],
            'ket'=>$request['ket'],
            'foto'=>$imgName
        ]);

        return redirect('/home')->with('status','Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ket  $ket
     * @return \Illuminate\Http\Response
     */
    public function show(ket $ket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ket  $ket
     * @return \Illuminate\Http\Response
     */
    public function edit(ket $ket)
    {
        return view('kets.edit', compact('ket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ket  $ket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ket $ket)
    {
        $imgName=null;
        if($request->foto){
            $imgName=$request->foto->getClientOriginalName() .'-' . time(). '-' . $request->foto->extension();    
            
            //$imgName=$request->foto->getClientOriginalName();
            $request->foto->move(public_path('post-images'),$imgName);
        }

        ket::where('id',$ket->id)
        ->update(['nama'=>$request->nama,
                    'nis'=>$request->nis,
                    'ket'=>$request->ket,
                    'foto'=>$imgName]);
        return redirect('/ket')->with('status','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ket  $ket
     * @return \Illuminate\Http\Response
     */
    public function destroy(ket $ket)
    {
        $ket->delete();

        return redirect()->route('kets.index')
                        ->with('success', 'berhasil hapus!');
    }
}