<?php

namespace App\Services\Galon\Transaksi;
use App\Models\Galon\Utang;
class UtangTransaksi extends AbstractTransaksi
{
    public function setTransaksi()
    {
        $this->targetTransaksi = Utang::firstOrCreate(
            [
                'payer_type' => $this->attribute['payer_type'],
                'payer_id' => $this->attribute['payer_id'],
                'aset_id' => $this->attribute['aset_id'],
            ],
            [
                'jumlah' => $this->attribute['jumlah'],
                'keterangan' => $this->attribute['keterangan'],
            ]
        );
    }
}
