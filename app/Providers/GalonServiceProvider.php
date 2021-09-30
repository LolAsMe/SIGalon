<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Galon\GalonService as GalonServiceContract;
use App\Services\Galon\GalonService;
use Illuminate\Database\Eloquent\Relations\Relation;

class GalonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        // $this->app->bind(GalonServiceContract::class, GalonService::class);
        $this->app->bind(GalonService::class, function ($app) {
            return new GalonService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Relation::morphMap([
            'Aset' => 'App\Models\Galon\Aset',
            'DetailTransaksi' => 'App\Models\Galon\DetailTransaksi',
            'Distributor' => 'App\Models\Galon\Distributor',
            'Laba' => 'App\Models\Galon\Laba',
            'Log' => 'App\Models\Galon\Log',
            'Piutang' => 'App\Models\Galon\Piutang',
            'Saldo' => 'App\Models\Galon\Saldo',
            'Suplier' => 'App\Models\Galon\Suplier',
            'Transaksi' => 'App\Models\Galon\Transaksi',
            'Utang' => 'App\Models\Galon\Utang',
        ]);
    }
}
