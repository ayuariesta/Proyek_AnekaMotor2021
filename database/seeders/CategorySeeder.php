<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'name' => 'Honda',
        ]);

        DB::table('categories')->insert([
        	'name' => 'Yamaha',
        ]);

        DB::table('categories')->insert([
        	'name' => 'Suzuki',
        ]);

        DB::table('categories')->insert([
        	'name' => 'Kawasaki',
        ]);
    }
}
