<?php

namespace App\Http\Controllers\Galon;

use App\Http\Controllers\Controller;
use App\Models\Galon\Piutang;
use Illuminate\Http\Request;

class PiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $piutangs = Piutang::with(['payer','aset','log'=>function($query){
            $query->latest('id')->take(10);
        }])->get();
        return response()->json($piutangs);
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
        $piutang = Piutang::create($request->all());
        return response($piutang);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galon\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function show(Piutang $piutang)
    {
        //
        return response($piutang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galon\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piutang $piutang)
    {
        //
        $newPiutang = $piutang->update($request->all());
        return response()->json($piutang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galon\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piutang $piutang)
    {
        //
        $piutang->delete();
        return response()->json('berhasil');
    }
}
