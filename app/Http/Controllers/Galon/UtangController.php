<?php

namespace App\Http\Controllers\Galon;

use App\Http\Controllers\Controller;
use App\Models\Galon\Utang;
use Illuminate\Http\Request;

class UtangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $utangs = Utang::all();
        return response()->json($utangs);
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
        $utang = Utang::create($request->all());
        return response($utang);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galon\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function show(Utang $utang)
    {
        //
        return response($utang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galon\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utang $utang)
    {
        //
        $newUtang = $utang->update($request->all());
        return response()->json($newUtang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galon\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utang $utang)
    {
        //
        $utang->delete();
        return response()->json('berhasil');
    }
}
