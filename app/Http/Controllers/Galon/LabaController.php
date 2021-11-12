<?php

namespace App\Http\Controllers\Galon;

use App\Http\Controllers\Controller;
use App\Models\Galon\Laba;
use Illuminate\Http\Request;

class LabaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $labas = Laba::with(['log' => function ($query) {
            $query->latest('id')->take(7);
        }])->get();
        return response()->json($labas);
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
        $laba = Laba::create($request->all());
        return response($laba);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galon\Laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function show(Laba $laba)
    {
        //
        return response($laba);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galon\Laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $laba = Laba::find(1);
        $attribute = $request->all();
        if (isset($attribute['total'])) {
            $laba->increment('total', -$attribute['total']);
            if ($attribute['total'] > 0) {
                $attribute['kredit'] = $attribute['total'];
            } else {
                $attribute['debit'] = -$attribute['total'];
            }
            $laba->setLogAttribute($attribute)->createLog();
        }
        return response()->json($laba);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galon\Laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laba $laba)
    {
        //
        $laba->delete();
        return response()->json('berhasil');
    }
}
