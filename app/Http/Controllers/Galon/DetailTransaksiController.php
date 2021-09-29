<?php

namespace App\Http\Controllers\Galon;

use App\Http\Controllers\Controller;
use App\Models\Galon\DetailTransaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detailTransaksis = DetailTransaksi::all();
        return response()->json($detailTransaksis);
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
        $detailTransaksi = DetailTransaksi::create($request->all());
        return response($detailTransaksi);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galon\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //
        return response($detailTransaksi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galon\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        //
        $newDetailTransaksi = $detailTransaksi->update($request->all());
        return response()->json($detailTransaksi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galon\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        //
        $detailTransaksi->delete();
        return response()->json('berhasil');
    }
}
