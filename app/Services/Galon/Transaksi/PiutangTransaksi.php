<?php

namespace App\Services\Galon\Transaksi;

use App\Models\Galon\Piutang;

class PiutangTransaksi extends AbstractTransaksi
{
    public function setTransaksi()
    {
        $id = $this->attribute['id'] ?? 1;
        $this->targetTransaksi = Piutang::find($id);
        $this->targetTransaksi->total += $this->attribute['debit'] - $this->attribute['kredit'];
    }
}
