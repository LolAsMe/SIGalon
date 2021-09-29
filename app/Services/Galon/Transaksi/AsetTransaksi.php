<?php

namespace App\Services\Galon\Transaksi;

use App\Models\Galon\Aset;
use App\Models\Galon\Transaksi;

class AsetTransaksi
{
    // aset
    //     id
    //     harga_jual decimal(8,2)
    //     harga_beli decimal(8,2)
    //     jumlah int
    //     total decimal(12,2)

    //     Table: log
    // Columns:
    // owner_type varchar(255)
    // owner_id bigint UN
    // detail_transaksi_id bigint UN
    // nama varchar(255)
    // debit decimal(8,2)
    // kredit decimal(8,2)
    // total decimal(12,2)
    // keterangan varchar(255)


    // Table: transaksi
    // Columns:
    // id bigint UN AI PK
    // tanggal datetime
    // total decimal(12,2)
    // status enum('Pending','Canceled','Paid Out','Ok','Draft')
    // keterangan varchar(255)


    // Table: detail_transaksi
    // Columns:
    // id bigint UN AI PK
    // transaksi_id bigint UN
    // jumlah int
    // harga decimal(8,2)
    // debit decimal(8,2)
    // kredit decimal(8,2)
    // total decimal(8,2)
    // status enum('Pending','Canceled','Paid Out','Ok','Draft')
    // keterangan varchar(255)


    // request
    //aset_id:2
    // jumlah:4
    // debit:40000
    // total:40000
    // keterangan:test
    // harga:10000
    // sender_type:aset
    // sender_id:2
    // receiver_type:saldo
    // receiver_id:1

    protected $attribute;
    protected Transaksi $transaksi;
    protected Aset $aset;


    public function __construct(array $attribute)
    {
        $this->attribute = $attribute;
        $this->transaksi = Transaksi::whereStatus('Draft')->first();
        $this->aset = Aset::find($attribute['id']);
    }

    // $transaksiAttribute['jumlah'] = $attribute['jumlah'];
    // $transaksiAttribute['debit'] = $attribute['debit']??0;
    // $transaksiAttribute['kredit'] = $attribute['kredit']??0;
    // $transaksiAttribute['keterangan'] = $attribute['keterangan'];
    // $transaksiAttribute['harga'] = $attribute['harga'];

    public function transact()
    {
        dd($this->attribute);
        $this->transaksi->setDetailAttribute($this->attribute)->transact();

        $this->aset->decrement('jumlah');
        $this->aset->decrement('total',$this->attribute['kredit']);
        unset($this->attribute['harga']);
        $this->aset->log()->create($this->attribute);
        dd($this->aset);

        // $jumlah = $this->attribute['debit'] + $this->attribute['kredit'];
        // $this->transaksi->increment('total', $jumlah);

        // kurang/tambah aset Aset

        // create llog aset
    }
    public function filterDetailAttribute(array $attribute)
    {
        // $detailAttribute = [];
        // $detailAttribute['jumlah'] = $attribute['jumlah'];
        // $detailAttribute['debit'] = $attribute['debit'] ?? 0;
        // $detailAttribute['kredit'] = $attribute['kredit'] ?? 0;
        // $detailAttribute['keterangan'] = $attribute['keterangan'];
        // $detailAttribute['harga'] = $attribute['harga'];
        // $detailAttribute['total'] = $this->transaksi->total;
        // return $detailAttribute;
    }
}
