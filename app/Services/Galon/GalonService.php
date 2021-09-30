<?php

namespace App\Services\Galon;

use App\Models\Galon\Aset;
use App\Models\Galon\Laba;
use App\Models\Galon\Piutang;
use App\Models\Galon\Saldo;
use App\Models\Galon\Transaksi;
use App\Models\Galon\Utang;
use App\Services\Galon\Transaksi\AsetTransaksi;
use App\Services\Galon\Transaksi\LabaTransaksi;
use App\Services\Galon\Transaksi\SaldoTransaksi;
use App\Services\Galon\Transaksi\UtangTransaksi;

class GalonService
{
    public function setUpTransaksi($attribute)
    {
        if ($attribute['tipe'] == 'Aset') {
            return new AsetTransaksi($attribute);
            // return Aset::find($attribute['id']);
        } else if ($attribute['tipe'] == 'Saldo') {
            return new SaldoTransaksi($attribute);
        } else if ($attribute['tipe'] == 'Utang') {

            return new UtangTransaksi($attribute);

        } else if ($attribute['tipe'] == 'Piutang') {
            return Piutang::firstOrCreate(
                [
                    'payer_type' => $attribute['payer_type'],
                    'payer_id' => $attribute['payer_id'],
                    'aset_id' => $attribute['aset_id'],
                ],
                [
                    'jumlah' => $attribute['jumlah'],
                    'keterangan' => $attribute['keterangan'],
                ]
            );
        } else if ($attribute['tipe'] == 'Laba') {
            // $id = $attribute['id'] ?? 1;
            // return Laba::find(1);
            return new LabaTransaksi($attribute);
        }
    }
    public function transact(array $attributes)
    {
        Transaksi::whereStatus('Draft')->update(['status' => 'Canceled']);

        $transaksi = Transaksi::create(['status' => 'Draft']);

        foreach ($attributes as $attribute) {
            try {
                $transaksi->refresh();

                $attribute['transaksi'] = $transaksi;
                // dd($attribute['detail_transaksi_id']);

                $this->setUpTransaksi($attribute)->transact();
                // $targetTransaksi->setLogAttribute($attribute)->transact();
            } catch (\Throwable $th) {
                dd($th);
            }
        }
        $transaksi->status = 'Ok';
        $transaksi->save();
        dd('berhasil');
    }
}
