<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'owner_type'=>'App\Models\Tenongan\Admin',
            'owner_id'=>'1',
            'password'=>Hash::make('123456'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
