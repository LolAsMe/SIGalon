<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('suplier')->insert([
            'nama'=>'Utama',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
