<?php

namespace App\Services\Galon\Transaksi;

use App\Models\Galon\Saldo;

class SaldoTransaksi extends AbstractTransaksi
{
    public function setTransaksi()
    {
        $id = $this->attribute['id'] ?? 1;
        $this->targetTransaksi = Saldo::find($id);
        $this->targetTransaksi->total += $this->attribute['debit'] - $this->attribute['kredit'];
    }
}
