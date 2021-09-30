<?php

namespace App\Services\Galon\Transaksi;

use App\Models\Galon\Laba;

class LabaTransaksi extends AbstractTransaksi
{
    public function setTransaksi()
    {
        $id = $this->attribute['id'] ?? 1;
        $this->targetTransaksi = Laba::find($id);
        $this->targetTransaksi->total += $this->attribute['kredit'] - $this->attribute['debit'];
    }
}
