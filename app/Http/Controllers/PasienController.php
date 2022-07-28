<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Models\Kelurahan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use PDF;
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelurahans = Kelurahan::all();
        return view('pasien.index', compact('kelurahans'));
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
        //
        

        $this->validate($request,[
            'nama_pasien'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'rt'=>'required',
            'rw'=>'required',
            'kelurahan_id'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
           
        ]);

        $id = IdGenerator::generate(['table' => 'pasiens', 'length' => 10, 'prefix' => date('ym')]);
        // dd($id);
        $pasien = new Pasien();
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->no_telp = $request->no_telp;
        $pasien->id = $id;
        $pasien->rt = $request->rt;
        $pasien->rw = $request->rw;
        $pasien->kelurahan_id = $request->kelurahan_id;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //

    }

     public function print(Pasien $pasien)
    {
        //
        
        $pdf = PDF::loadView('pasien.print', ["pasiens" => [$pasien]]);
        $pdf->setPaper('A4', '');
        return $pdf->stream($pasien->nama_pasien . '.pdf');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
    }


    public function apipasien(Request $request)
    {
        $pasiens = Pasien::all();
        $datatables = datatables()->of($pasiens)
        ->addColumn('name', function($pasien) {
            $name = $pasien->kelurahan->nama_kelurahan;
            return $name;
        })
        ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
        $this->validate($request,[
            'nama_pasien'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'rt'=>'required',
            'rw'=>'required',
            'kelurahan_id'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
           
        ]);

        
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->no_telp = $request->no_telp;
        $pasien->rt = $request->rt;
        $pasien->rw = $request->rw;
        $pasien->kelurahan_id = $request->kelurahan_id;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        //
        $pasien->delete();
    }
}
