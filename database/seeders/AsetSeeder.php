<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('aset')->insert([
            'id'=>1,
            'nama'=>'Isi Galon',
            'harga_jual'=>10000,
            'harga_beli'=>8000,
            'jumlah'=>47,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('aset')->insert([
            'id'=>2,
            'nama'=>'Galon',
            'harga_jual'=>35000,
            'harga_beli'=>35000,
            'jumlah'=>77,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('aset')->insert([
            'id'=>3,
            'nama'=>'Kardus',
            'harga_jual'=>30000,
            'harga_beli'=>27500,
            'jumlah'=>23,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
