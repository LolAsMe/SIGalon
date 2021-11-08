<?php

namespace App\Services\Galon\Transaksi;

use App\Models\Galon\Transaksi;

abstract class AbstractTransaksi
{
    protected $attribute;
    protected $targetTransaksi;
    protected $transaksi;

    public function __construct($attribute)
    {
        $this->attribute = $attribute;
        $this->transaksi = $attribute['transaksi'] ?? new Transaksi();
        unset($this->attribute['transaksi']);
        $this->attribute['debit'] = $this->attribute['debit'] ?? 0;
        $this->attribute['kredit'] = $this->attribute['kredit'] ?? 0;
        $this->attribute['jumlah'] = $this->attribute['jumlah'] ?? 1;
        $this->attribute['harga'] = $this->attribute['harga'] ?? 0;
        $this->attribute['keterangan'] = "Aktor ".$this->transaksi->payer->nama;
    }

    abstract public function setTransaksi();

    public function transact()
    {
        $this->setTransaksi();
        $this->updateTransaksi();
        $this->createDetailTransaksi();
        $this->targetTransaksi->save();
        $this->createTargetTransaksiLog();
    }
    public function createTargetTransaksiLog()
    {
        $this->targetTransaksi->setLogAttribute($this->attribute)->createLog();
    }
    public function createDetailTransaksi()
    {

        $this->transaksi->setDetailAttribute($this->attribute)->createDetail();
        $this->attribute['detail_transaksi_id'] = $this->transaksi->getLastDetail()->id;
    }
    public function updateTransaksi()
    {
        $this->transaksi->debit += $this->attribute['debit'] ?? 0;
        $this->transaksi->kredit += $this->attribute['kredit'] ?? 0;
        if($this->attribute['kredit']>$this->attribute['debit']){
            $this->attribute['total'] = $this->transaksi->kredit;
        }else{
            $this->attribute['total'] = $this->transaksi->debit;
        }
        $this->transaksi->save();
    }
}
