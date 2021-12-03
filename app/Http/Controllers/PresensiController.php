<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presensi=presensi::all();        
        return view('presensi/index', compact('presensi'));
    }
    public function masuk()
    {
        return view('Presensi.Masuk');
    }

    public function keluar()
    {
        return view('Presensi.Keluar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Presensi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function kirim(Request $request)
    {
        $timezone = 'Asia/Makassar'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();
        if ($presensi){
            dd("sudah ada");
        }else{
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
            ]);
        }
         

        return redirect('presensi-masuk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'tgl'=>'required',
            'jammasuk'=>'required',
            'jamkeluar'=>'required',
            'jamkerja'=>'required'
        ]);

        Presensi::create($request->all());
        return redirect()->route('Presensi.index')
                        ->with('success', 'berhasil menyimpan !');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function halamanrekap()
    {
        return view('Presensi.Halaman-rekap-karyawan');
    }

   
    public function tampildatakeseluruhan($tglawal, $tglakhir)
    {
        $presensi = Presensi::with('user')->whereBetween('tgl',[$tglawal, $tglakhir])->orderBy('tgl','asc')->get();
        return view('Presensi.Rekap-karyawan',compact('presensi'));
    }

   
    public function presensipulang(){
        $timezone = 'Asia/Makassar'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();
        
        $dt=[
            'jamkeluar' => $localtime,
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($presensi->jammasuk))
        ];

        if ($presensi->jamkeluar == ""){
            $presensi->update($dt);
            return redirect('presensi-keluar');
        }else{
            dd("sudah ada");
        }
    }
    public function edit(presensi $presensi)
    {
        return view('presensi.edit', compact('presensi'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Presensi->delete();

        return redirect()->route('Presensi.index')
                        ->with('success', 'berhasil hapus!');
    }
}
