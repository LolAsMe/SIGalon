<?php

namespace App\Services\Galon\Transaksi;

use App\Models\Galon\Aset;
use App\Models\Galon\Piutang;
use App\Models\Galon\Utang;

class UtangTransaksi extends AbstractTransaksi
{
    protected $sisaJumlah = 0;
    public function setTransaksi()
    {
        $aset = Aset::find($this->attribute['aset_id']);
        $this->attribute['harga'] = $aset->harga_beli;

        $utang = Utang::wherePayerId($this->attribute['payer_id'])
            ->wherePayerType($this->attribute['payer_type'])
            ->whereAsetId($this->attribute['aset_id'])
            ->whereStatus('Pending')
            ->first();
        $piutang = Piutang::wherePayerId($this->attribute['payer_id'])
            ->wherePayerType($this->attribute['payer_type'])
            ->whereAsetId($this->attribute['aset_id'])
            ->whereStatus('Pending')
            ->first();

        if ($piutang == null && $utang) {
            $this->targetTransaksi = $utang;
        } else if ($utang == null && $piutang) {
            $this->targetTransaksi = $piutang;
        } else if ($utang && $piutang) {
            dd('error');
        } else {
            if ($this->attribute['tipe'] == 'Utang') {
                if ($this->attribute['kode'] == "debit") {
                    $this->createUtang();
                } else if ($this->attribute['kode'] == "kredit") {
                    $this->createPiutang();
                }
            } else if ($this->attribute['tipe'] == 'Piutang') {
                if ($this->attribute['kode'] == "debit") {
                    $this->createPiutang();
                } else if ($this->attribute['kode'] == "kredit") {
                    $this->createUtang();
                }
            }
        }

        $this->hitungUtang();
        $this->checkUtang();

        // dd($this->targetTransaksi);
    }
    public function createUtang()
    {
        $this->targetTransaksi = Utang::create([
            'payer_type' => $this->attribute['payer_type'],
            'payer_id' => $this->attribute['payer_id'],
            'aset_id' => $this->attribute['aset_id'],
            'status' => 'Pending',
            'harga' => $this->attribute['harga'],
            'jumlah' => 0,
            'keterangan' => $this->attribute['keterangan'],
        ]);
    }

    public function createPiutang()
    {
        $this->targetTransaksi = Piutang::create([
            'payer_type' => $this->attribute['payer_type'],
            'payer_id' => $this->attribute['payer_id'],
            'aset_id' => $this->attribute['aset_id'],
            'status' => 'Pending',
            'harga' => $this->attribute['harga'],
            'jumlah' => 0,
            'keterangan' => $this->attribute['keterangan'],
        ]);
    }

    public function hitungUtang()
    {
        $jumlah = $this->attribute['jumlah'];
        if (class_basename($this->targetTransaksi) == $this->attribute['tipe']) {
            if ($this->attribute['kode'] == "kredit") {
                $jumlah = -$this->attribute['jumlah'];
                $this->attribute['kredit'] = $this->attribute['jumlah'] * $this->attribute['harga'];
            } else {
                $this->attribute['debit'] = $this->attribute['jumlah'] * $this->attribute['harga'];
            }
        } else if (class_basename($this->targetTransaksi) != $this->attribute['tipe']) {
            if ($this->attribute['kode'] == "debit") {
                $jumlah = -$this->attribute['jumlah'];
                $this->attribute['debit'] = $this->attribute['jumlah'] * $this->attribute['harga'];
            } else {

                $this->attribute['kredit'] = $this->attribute['jumlah'] * $this->attribute['harga'];
            }
        }
        $this->attribute['total'] = $this->attribute['debit'] - $this->attribute['kredit'];
        $this->targetTransaksi->jumlah += $jumlah;


        // if($this->targetTransaksi->jumlah<0){
        //     $this->attribute['jumlah'] = -$this->targetTransaksi->jumlah;
        //     $this->targetTransaksi->jumlah = 0;
        // dd($this->targetTransaksi->save());
        // dd($this->attribute);
        // $attributeBaru = array_merge($this->attribute,['transaksi'=>$this->transaksi]);
        // $baru = new self($attributeBaru);
        // $baru->transact();
        // dd($baru);
        // }

    }

    public function checkUtang()
    {
        if ($this->targetTransaksi->jumlah * $this->attribute['harga'] <= $this->targetTransaksi->bayar) {
            $this->targetTransaksi->status = "Ok";
            $this->sisaJumlah = -$this->targetTransaksi->jumlah;
            $this->targetTransaksi->jumlah = 0;
        }
    }

    public function transact()
    {
        $this->setTransaksi();
        $this->updateTransaksi();
        $this->createDetailTransaksi();
        $this->targetTransaksi->save();
        $this->createTargetTransaksiLog();
        $this->checkSisa();
    }

    public function checkSisa()
    {
        if ($this->sisaJumlah > 0) {
            $this->attribute['jumlah'] = $this->sisaJumlah;
            $this->sisaJumlah = 0;
            $this->setTransaksi();
            $this->targetTransaksi->save();
            $this->createTargetTransaksiLog();
        }
    }
}
