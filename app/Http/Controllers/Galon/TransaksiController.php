<?php

namespace App\Http\Controllers\Galon;

use App\Http\Controllers\Controller;
use App\Models\Galon\Transaksi;
use App\Services\Galon\GalonService;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    protected $galonService;
    public function __construct(GalonService $galonService) {
        $this->galonService = $galonService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksis = Transaksi::all();
        return response()->json($transaksis);
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
         $transaksi = json_decode($request->getContent(),true);
        $this->galonService->transact($transaksi);
        // $transaksi = Transaksi::create($request->all());
        // return response($transaksi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {
        //
        $transaksi = Transaksi::create($request->all());
        return response($transaksi);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galon\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
        return response($transaksi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galon\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $newTransaksi = $transaksi->update($request->all());
        return response()->json($transaksi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galon\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        $transaksi->delete();
        return response()->json('berhasil');
    }
}
