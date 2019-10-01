<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'damian.mg85@gmail.com',
            'password' => bcrypt('cortiXX12NU'),
        ]);

        DB::table('users')->insert([
            'name' => 'Germán',
            'email' => 'german@square1.io',
            'password' => bcrypt('12345'),
        ]);

        DB::table('users')->insert([
            'name' => 'Luciana',
            'email' => 'luci@square1.io',
            'password' => bcrypt('12345'),
        ]);
    }
}
