<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('distributor')->insert([
            'nama'=>'Pak Mul',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('distributor')->insert([
            'nama'=>'Pak Syafrudin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('distributor')->insert([
            'nama'=>'Pak Mardiyono',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('distributor')->insert([
            'nama'=>'Pak Mul',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('distributor')->insert([
            'nama'=>'Mas Sholikin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('distributor')->insert([
            'nama'=>'Mas Mukhlis',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('distributor')->insert([
            'nama'=>'Home',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
