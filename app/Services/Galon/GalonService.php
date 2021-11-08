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
use App\Services\Galon\Transaksi\PiutangTransaksi;
use App\Services\Galon\Transaksi\SaldoTransaksi;
use App\Services\Galon\Transaksi\UtangTransaksi;

class GalonService
{
    public function setUpTransaksi($attribute)
    {
        if ($attribute['tipe'] == 'Aset') {
            return new AsetTransaksi($attribute);
        } else if ($attribute['tipe'] == 'Saldo') {
            return new SaldoTransaksi($attribute);
        } else if ($attribute['tipe'] == 'Utang' || $attribute['tipe'] == 'Piutang') {
            return new UtangTransaksi($attribute);
        // } else if ($attribute['tipe'] == 'Piutang') {
        //     return new PiutangTransaksi($attribute);
        //     return Piutang::firstOrCreate(
        //         [
        //             'payer_type' => $attribute['payer_type'],
        //             'payer_id' => $attribute['payer_id'],
        //             'aset_id' => $attribute['aset_id'],
        //         ],
        //         [
        //             'jumlah' => $attribute['jumlah'],
        //             'keterangan' => $attribute['keterangan'],
        //         ]
        //     );
        } else if ($attribute['tipe'] == 'Laba') {
            return new LabaTransaksi($attribute);
        }
    }
    public function transact(array $data)
    {
        Transaksi::whereStatus('Draft')->update(['status' => 'Canceled']);
        $transaksi = Transaksi::create(['status' => 'Draft','payer_id'=>$data['payer_id'],'payer_type'=>$data['payer_type']]);
        $transaksi->load('payer')->refresh();
        foreach ($data['transaksis'] as $attribute) {
            try {

                $attribute['transaksi'] = $transaksi;
                $attribute['payer_id'] = $data['payer_id'] ?? 0;
                $attribute['payer_type'] = $data['payer_type']??0;
                $this->setUpTransaksi($attribute)->transact();
            } catch (\Throwable $th) {
                dd($th);
            }
        }
        $transaksi->status = 'Ok';
        $transaksi->save();
    }
}
