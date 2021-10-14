<?php

namespace App\Services\Galon\Transaksi;

use App\Models\Galon\Aset;
use App\Models\User;

class AsetTransaksi extends AbstractTransaksi
{

    public function setTransaksi()
    {
        $id = $this->attribute['id'] ?? 1;
        $this->targetTransaksi = Aset::find($id);
        $this->attribute['harga'] = $this->targetTransaksi->harga_beli;
        if ($this->attribute['kode'] == "debit") {
            $this->targetTransaksi->jumlah += $this->attribute['jumlah'];
            $this->attribute['debit'] = $this->targetTransaksi->harga_beli * $this->attribute['jumlah'];
        } else if ($this->attribute['kode'] == "kredit") {
            $this->targetTransaksi->jumlah -= $this->attribute['jumlah'];
            $this->attribute['kredit'] = $this->targetTransaksi->harga_beli * $this->attribute['jumlah'];
        }
        $this->targetTransaksi->save();
    }
    public function updateTransaksi()
    {
        if (isset($this->attribute['jenis']) && $this->attribute['jenis'] == 'utang') {
            $this->attribute['total'] = 0;
            $this->transaksi->save();
        }else{
            $this->transaksi->debit += $this->attribute['debit'] ?? 0;
            $this->transaksi->kredit += $this->attribute['kredit'] ?? 0;
            if ($this->attribute['kredit'] > $this->attribute['debit']) {
                $this->attribute['total'] = $this->transaksi->kredit;
            } else {
                $this->attribute['total'] = $this->transaksi->debit;
            }
            $this->transaksi->save();
        }
    }
}
