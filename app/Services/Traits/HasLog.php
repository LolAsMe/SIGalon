<?php

namespace App\Services\Traits;

use App\Models\Galon\Log;

trait HasLog
{
    protected $logAttribute;
    protected $lastLog=0;

    public function log()
    {
        return $this->morphMany(Log::class, 'owner');
    }

    public function createLog()
    {
        $this->lastLog = $this->log()->create($this->logAttribute);
    }
    public function getLastLog()
    {
        return $this->lastLog;
    }

    public function setLogAttribute(array $logAttribute)
    {
        isset($logAttribute['detail_transaksi_id']) ? $this->logAttribute['detail_transaksi_id'] = $logAttribute['detail_transaksi_id'] : '';
        isset($logAttribute['nama']) ? $this->logAttribute['nama'] = $logAttribute['nama'] : 'Log';
        isset($logAttribute['jumlah']) ? $this->logAttribute['jumlah'] = $logAttribute['jumlah'] : 0;
        $this->logAttribute['debit'] = $logAttribute['debit'] ?? 0;
        $this->logAttribute['kredit'] = $logAttribute['kredit'] ?? 0;
        isset($logAttribute['keterangan']) ? $this->logAttribute['keterangan'] = $logAttribute['keterangan'] : 0;
        isset($this->total) ? $this->logAttribute['total']= $this->getTotal() : 0;
        return $this;


    }
    public function getTotal()
    {
        return $this->total;
    }
    // public function transact()
    // {
    //     $this->createLog();
    // }
}
