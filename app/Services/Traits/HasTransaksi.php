<?php

namespace App\Services\Traits;

use App\Models\Galon\Transaksi;

trait HasTransaksi
{
    protected $logAttribute;
    protected $lastTransaksi=0;

    public function log()
    {
        return $this->morphMany(Transaksi::class, 'payer');
    }

    public function createTransaksi()
    {
        $this->lastTransaksi = $this->log()->create($this->logAttribute);
    }
    public function getLastTransaksi()
    {
        return $this->lastTransaksi;
    }

    public function setTransaksiAttribute(array $logAttribute)
    {
        isset($logAttribute['detail_transaksi_id']) ? $this->logAttribute['detail_transaksi_id'] = $logAttribute['detail_transaksi_id'] : '';
        isset($logAttribute['nama']) ? $this->logAttribute['nama'] = $logAttribute['tipe'] : '';
        isset($logAttribute['jumlah']) ? $this->logAttribute['jumlah'] = $logAttribute['jumlah'] : 0;
        $this->logAttribute['debit'] = $logAttribute['debit'] ?? 0;
        $this->logAttribute['kredit'] = $logAttribute['kredit'] ?? 0;
        isset($logAttribute['keterangan']) ? $this->logAttribute['keterangan'] = $logAttribute['keterangan'] : 0;
        return $this;
    }
    // public function transact()
    // {
    //     $this->createTransaksi();
    // }
}
