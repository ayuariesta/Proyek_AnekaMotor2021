<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_services')->insert([
            'name' => 'Hard Service',
            'price' => '120000'
        ]);
        
        DB::table('jenis_services')->insert([
            'name' => 'Medium Service',
            'price' => '70000'
        ]);
        
        DB::table('jenis_services')->insert([
            'name' => 'Easy Service',
            'price' => '30000'
        ]);
    }
}
