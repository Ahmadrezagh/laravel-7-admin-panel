<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Main Admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);
    }
}
