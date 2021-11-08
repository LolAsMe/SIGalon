<?php

namespace App\Http\Controllers\Galon;

use App\Http\Controllers\Controller;
use App\Models\Galon\Saldo;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $saldos = Saldo::with(['log'=>function($query){
            $query->latest('id')->take(7);
        }])->get();
        return response()->json($saldos);
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
        $saldo = Saldo::create($request->all());
        return response($saldo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galon\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function show(Saldo $saldo)
    {
        //
        return response($saldo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galon\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saldo $saldo)
    {
        //
        $newSaldo = $saldo->update($request->all());
        return response()->json($saldo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galon\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saldo $saldo)
    {
        //
        $saldo->delete();
        return response()->json('berhasil');
    }
}
