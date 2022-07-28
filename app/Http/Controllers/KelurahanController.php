<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kelurahan.index');
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
            'nama_kelurahan'=>'required',
            'nama_kecamatan'=>'required',
            'nama_kota'=>'required',
        ]);

        $kelurahan = new Kelurahan();
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->nama_kecamatan = $request->nama_kecamatan;
        $kelurahan->nama_kota = $request->nama_kota;
        $kelurahan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

     public function apikelurahan(Request $request)
    {
        $kelurahans = Kelurahan::all();
        $datatables = datatables()->of($kelurahans)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        //
         $this->validate($request,[
            'nama_kelurahan'=>'required',
            'nama_kecamatan'=>'required',
            'nama_kota'=>'required',
        ]);

        
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->nama_kecamatan = $request->nama_kecamatan;
        $kelurahan->nama_kota = $request->nama_kota;
        $kelurahan->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan)
    {
        //
        $kelurahan->delete();
    }
}
