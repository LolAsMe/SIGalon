<?php

namespace App\Services\Galon;

use App\Models\Galon\Aset;
use App\Models\Galon\Saldo;
use App\Models\Galon\Transaksi;
use App\Services\Galon\Transaksi\AsetTransaksi;

class GalonService
{
    public function setUpTransaksi($tipe)
    {
        if ($tipe == 'Aset') {
            return new Aset();
        } else if ($tipe == 'Saldo') {
            return new Saldo();
        } else if ($tipe == 'Utang') {
        } else if ($tipe == 'Piutang') {
        }
    }
    public function transact(array $attributes)
    {
        // check transaksi
        Transaksi::whereStatus('Draft')->update(['status' => 'Canceled']);

        $transaksi = Transaksi::create(['status'=>'Draft']);
        // create transaksi status draft

        // request
        // jumlah:4
        // debit:40000
        // total:40000
        // keterangan:test
        // harga:10000
        // sender_type:aset
        // sender_id:2
        // receiver_type:saldo
        // receiver_id:1

        // $requests = $this->filterTransaksiRequest($attribute);
        // dd($requests);
        foreach ($attributes as $attribute) {
            $transaksi->setDetailAttribute($attribute)->transact();
            $lastDetail = $transaksi->getLastDetail();
            $targetTransaksi = $this->setUpTransaksi($attribute['tipe'])->find($attribute['id']);
            $targetTransaksi->setLogAttribute($attribute)->transact($lastDetail);
        }

        $transaksi->status = 'Ok';
        $transaksi->save();
        dd('berhasil');

        // transaksi status Ok
        // return

        // $transaksi = Transaksi::create(['total' => $attribute['total']]);
        // $detail = $transaksi->detail()->create($attribute);
        // dd($detail);
    }

    public function filterTransaksiRequest(array $attribute)
    {
        // $requests = [];
        // $requestAttribute = [];
        // $requestAttribute['debit'] = $attribute['debit'] ?? 0;
        // $requestAttribute['kredit'] = $attribute['kredit'] ?? 0;
        // $requestAttribute['keterangan'] = $attribute['keterangan'];
        // $requestAttribute['harga'] = $attribute['harga'];
        // $requestAttribute['jumlah'] = $attribute['receiver_jumlah'];
        // $requestAttribute['tipe'] = $attribute['receiver_type'];
        // $requestAttribute['id'] = $attribute['receiver_id'];
        // array_push($requests, $requestAttribute);
        // $requestAttribute['debit'] = $attribute['kredit'] ?? 0;
        // $requestAttribute['kredit'] = $attribute['debit'] ?? 0;
        // $requestAttribute['jumlah'] = $attribute['sender_jumlah'];
        // $requestAttribute['tipe'] = $attribute['sender_type'];
        // $requestAttribute['id'] = $attribute['sender_id'];
        // array_push($requests, $requestAttribute);
        // return $requests;
    }
}
