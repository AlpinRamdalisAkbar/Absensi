<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use DateTimeZone;
use App\Models\Dashboard1;
use App\Models\Presensi;
use Illuminate\Http\Request;

class Dashboard1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //mengembalikan tampilan dashboard1.index
    public function index()
    {
        return view('dashboard1.index');
    }

    public function keluar()
    {
        return view('dashboard1.Keluar');
    }

    public function validasi()
    {
        $dashboard1 = presensi::latest()->paginate(5);
        $dashboard1 = presensi::where('user_id', Auth::user()->id)->get();

        return view('dashboard1.validasi',compact('dashboard1')) //memberikan pagination saat data >= 5
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function selesaiValidasi()
    {
        $dashboard1 = presensi::latest()->paginate(5);
        $dashboard1 = presensi::where('user_id', Auth::user()->id)->get();

        return view('dashboard1.selesaiValidasi',compact('dashboard1'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $dashboard1 = Presensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();
        if ($dashboard1){
            dd("sudah ada");
        }else{
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
            ]);
        }
         

        return redirect('dashboard1.keluar');
    }

    public function presensipulang(){
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $dashboard1 = Presensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();
        
        $dt=[
            'jamkeluar' => $localtime,
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($dashboard1->jammasuk))
        ];

        if ($dashboard1->jamkeluar == ""){
            $dashboard1->update($dt);
            return redirect('dashboard1.validasi');
        }else{
            dd("sudah ada");
        }
    }

    public function beresvalidasi(Request $request)
    {
        $masuk = $request -> jammasuk;
        $pulang = $request -> jamkeluar;
        if($masuk != null && $pulang != null){
            return redirect()->route('dashboard1.selesaiValidasi')
                        ->with('success','Absen Berhasil !');
        }
        else {
            return redirect()->route('dashboard1.selesaiValidasi')
                        ->with('warning','Absen Berhasil !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard1  $dashboard1
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard1 $dashboard1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard1  $dashboard1
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard1 $dashboard1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard1  $dashboard1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard1 $dashboard1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard1  $dashboard1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard1 $dashboard1)
    {
        //
    }
}
