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
        $asets = Aset::with(['log' => function ($query) {
            $query->latest()->take(7);
        }])->get();
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
            $attribute = $request->all();
            if(isset($attribute['harga_jual'])){

                $attribute['harga_jual'] = $this->getAmount($attribute['harga_jual']);
            }
            if(isset($attribute['harga_beli'])){

                $attribute['harga_beli'] = $this->getAmount($attribute['harga_beli']);
            }
            $aset->update($attribute);
            $attribute['nama'] = 'Update';
            $aset->refresh();
            $aset->setLogAttribute($attribute)->createLog();
            return response()->json($aset);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getAmount($money)
    {
        $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
        $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

        $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

        $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
        $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);

        return (float) str_replace(',', '.', $removedThousandSeparator);
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
