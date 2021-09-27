<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StartDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->default('aset');
            $table->decimal('harga_jual');
            $table->decimal('harga_beli');
            $table->integer('jumlah')->default(1);
            $table->decimal('total',12)->default(0);
            $table->enum('status', ['Pending', 'Canceled', 'Paid Out', 'Ok', 'Draft'])->default('Ok');
            $table->string('keterangan')->default('aset');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('log', function (Blueprint $table) {
            $table->id();
            $table->morphs('owner');
            $table->foreignId('detail_transaksi_id')->nullable();
            $table->string('nama')->default('log');
            $table->decimal('debit')->default(0);
            $table->decimal('kredit')->default(0);
            $table->decimal('total',12)->default(0);
            $table->string('keterangan')->default('aset');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('saldo', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 12)->default(0);
            $table->softDeletes();
            $table->timestamps();
        });



        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal')->useCurrent();
            $table->decimal('total', 12);
            $table->enum('status', ['Pending', 'Canceled', 'Paid Out', 'Ok', 'Draft'])->default('Ok');
            $table->string('keterangan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id');
            $table->foreignId('aset_id');
            $table->integer('jumlah')->default(1);
            $table->decimal('harga');
            $table->decimal('debit')->default(0);
            $table->decimal('kredit')->default(0);
            $table->decimal('total')->default(0);
            $table->enum('status', ['Pending', 'Canceled', 'Paid Out', 'Ok', 'Draft'])->default('Ok');
            $table->string('keterangan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('piutang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aset_id')->nullable();
            $table->string('nama');
            $table->integer('jumlah')->default(1);
            $table->decimal('bayar')->default(0);
            $table->decimal('harga', 7);
            $table->decimal('total',12);
            $table->string('keterangan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('utang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aset_id')->nullable();
            $table->string('nama');
            $table->integer('jumlah')->default(1);
            $table->decimal('bayar')->default(0);
            $table->decimal('harga');
            $table->decimal('total',12);
            $table->string('keterangan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('log');
        Schema::dropIfExists('detail_transaksi');
        Schema::dropIfExists('saldo');
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('piutang');
        Schema::dropIfExists('utang');
        Schema::dropIfExists('aset');
        Schema::dropIfExists('admin');
    }
}
