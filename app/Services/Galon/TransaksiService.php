<?php

namespace App\Services\Galon;

use App\Models\Galon\Transaksi;

class GalonService
{
    public function setUpTransaksi(string $tipe = 'Aset')
    {
        if ($tipe == 'Aset') {
        } else if ($tipe == 'Saldo') {
        } else if ($tipe == 'Utang') {
        } else if ($tipe == 'Piutang') {
        }
        return $this;
    }
    public function transact(array $attribute)
    {
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

        $transaksis = $this->filterTransaksiAttribute($attribute);
        dd($transaksis);
        // sender
        $this->setUpTransaksi();

        // receiver
        $this->setUpTransaksi();

        // transaksi status Ok
        // return

        $transaksi = Transaksi::create(['total' => $attribute['total']]);
        $detail = $transaksi->detail()->create($attribute);
        dd($detail);
    }

    public function filterTransaksiAttribute(array $attribute)
    {
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

        $transaksis = [];
        $transaksiAttribute = [];
        $transaksiAttribute['jumlah'] = $attribute['jumlah'];
        $transaksiAttribute['debit'] = $attribute['debit'];
        $transaksiAttribute['kredit'] = $attribute['kredit'];
        $transaksiAttribute['keterangan'] = $attribute['keterangan'];
        $transaksiAttribute['harga'] = $attribute['harga'];
        $transaksiAttribute['tipe'] = $attribute['receiver_type'];
        $transaksiAttribute['id'] = $attribute['receiver_id'];
        array_push($transaksis, $transaksiAttribute);
        $transaksiAttribute['tipe'] = $attribute['sender_type'];
        $transaksiAttribute['id'] = $attribute['receiver_id'];
        array_push($transaksis, $transaksiAttribute);
        return $transaksis;
    }
}
