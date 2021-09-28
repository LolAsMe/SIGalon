<?php

namespace App\Http\Controllers\Galon;

use App\Http\Controllers\Controller;
use App\Models\Galon\Aset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asets = Aset::all();
        return response()->json($asets);
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
        $aset = Aset::create($request->all());
        return response($aset);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galon\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function show(Aset $aset)
    {
        //
        return response($aset);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galon\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aset $aset)
    {
        //
        try {
            $newAset = $aset->update($request->all());
            return response()->json($aset);

        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galon\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aset $aset)
    {
        //
        $aset->delete();
        return response()->json('berhasil');
    }
}
