<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('laba')->insert([
            'id'=>1,
            'nama'=>'Utama',
            'total'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('laba')->insert([
            'id'=>2,
            'nama'=>'Laba Diambil',
            'total'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
