<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('post')->insert([
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'topics' => 'Belajar Pemrograman Dasar',
            // 'file' => 'backgroundjpeg.'
        ]);
    }
}
