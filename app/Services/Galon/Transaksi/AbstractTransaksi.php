<?php

namespace App\Services\Galon\Transaksi;

use App\Models\Galon\Aset;
use App\Models\Galon\Laba;
use App\Models\Galon\Piutang;
use App\Models\Galon\Saldo;
use App\Models\Galon\Transaksi;
use App\Models\Galon\Utang;

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
    }

    abstract public function setTransaksi();

    public function transact()
    {
        $this->setTransaksi();
        $this->createDetailTransaksi();
        $this->targetTransaksi->save();
        $this->createLog();
    }
    public function createLog()
    {
        $this->targetTransaksi->setLogAttribute($this->attribute)->createLog();
    }
    public function createDetailTransaksi()
    {
        $this->transaksi->debit += $this->attribute['debit'] ?? 0;
        $this->transaksi->kredit += $this->attribute['kredit'] ?? 0;
        $this->transaksi->save();
        $this->transaksi->setDetailAttribute($this->attribute)->createDetail();
        $this->attribute['detail_transaksi_id'] = $this->transaksi->getLastDetail()->id;
    }
}
