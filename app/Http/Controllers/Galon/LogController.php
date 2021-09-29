<?php

namespace App\Http\Controllers\Galon;

use App\Http\Controllers\Controller;
use App\Models\Galon\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $logs = Log::all();
        return response()->json($logs);
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
        $log = Log::create($request->all());
        return response($log);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galon\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
        return response($log);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galon\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
        $newLog = $log->update($request->all());
        return response()->json($log);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galon\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
        $log->delete();
        return response()->json('berhasil');
    }
}
