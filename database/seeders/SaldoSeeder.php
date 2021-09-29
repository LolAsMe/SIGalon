<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('saldo')->insert([
            'nama'=>'Utama',
            'total'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
