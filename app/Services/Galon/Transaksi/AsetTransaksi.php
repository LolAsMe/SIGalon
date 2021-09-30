<?php

namespace App\Services\Galon\Transaksi;

use App\Models\Galon\Aset;

class AsetTransaksi extends AbstractTransaksi
{

    public function setTransaksi()
    {
        $id = $this->attribute['id'] ?? 1;
        $this->targetTransaksi = Aset::find($id);
        $this->attribute['harga'] = $this->transaksi['harga_jual'];
        if ($this->attribute['kode'] == "debit") {
            $this->targetTransaksi->jumlah += $this->attribute['jumlah'];
            $this->attribute['debit'] = $this->targetTransaksi->harga_beli * $this->attribute['jumlah'];
        } else if ($this->attribute['kode'] == "kredit") {
            $this->targetTransaksi->jumlah -= $this->attribute['jumlah'];
            $this->attribute['kredit'] = $this->targetTransaksi->harga_beli * $this->attribute['jumlah'];
        }
    }
}
