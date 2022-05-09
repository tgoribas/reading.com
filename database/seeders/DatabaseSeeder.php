<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'Maya Stella',
            'email' => 'maya_stella_assis@mixfmmanaus.com.br'
        ]);
        DB::table('users')->insert([
            'name' => 'Esther Milena',
            'email' => 'esther_milena@lucaslima.com'
        ]);
    }
}
