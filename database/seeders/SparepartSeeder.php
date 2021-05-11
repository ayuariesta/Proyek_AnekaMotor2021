<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spareparts')->insert([
            'category_id' => 1,
            'name' => 'Filter Udara',
            'price' => '32000',
            'stock' => 14
        ]);


        DB::table('spareparts')->insert([
            'category_id' => 1,
            'name' => 'Kampas Rem Depan',
            'price' => '41000',
            'stock' => 20
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 1,
            'name' => 'Kampas Rem Belakang',
            'price' => '63000',
            'stock' => 10
        ]);

        
        DB::table('spareparts')->insert([
            'category_id' => 1,
            'name' => 'Kampas Kopling Set',
            'price' => '110000',
            'stock' => 91
        ]);

        
        DB::table('spareparts')->insert([
            'category_id' => 1,
            'name' => 'Bohlam Lampu Depan',
            'price' => '114000',
            'stock' => 37
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 1,
            'name' => 'Ring Piston',
            'price' => '45000',
            'stock' => 54
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 1,
            'name' => 'Gir Depan',
            'price' => '35500',
            'stock' => 114
        ]);
      
        DB::table('spareparts')->insert([
            'category_id' => 1,
            'name' => 'Gir Belakang',
            'price' => '63000',
            'stock' => 114
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 2,
            'name' => 'V-Belt',
            'price' => '63000',
            'stock' => 7
        ]);


        DB::table('spareparts')->insert([
            'category_id' => 2,
            'name' => 'CDI',
            'price' => '220000',
            'stock' => 93
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 2,
            'name' => 'Kampas Rem Depan/set',
            'price' => '75000',
            'stock' => 23
        ]);

        
        DB::table('spareparts')->insert([
            'category_id' => 2,
            'name' => 'Kampas Rem Belakang',
            'price' => '37000',
            'stock' => 46
        ]);

        
        DB::table('spareparts')->insert([
            'category_id' => 2,
            'name' => 'Sokbreker Belakang',
            'price' => '141000',
            'stock' => 11
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 2,
            'name' => 'Saringan Udara',
            'price' => '58000',
            'stock' => 50
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 2,
            'name' => 'Sokbreker Belakang',
            'price' => '267000',
            'stock' => 7
        ]);
      
        DB::table('spareparts')->insert([
            'category_id' => 2,
            'name' => 'Ring Piston',
            'price' => '69000',
            'stock' => 18
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 3,
            'name' => 'Kampas Rem Depan Belakang',
            'price' => '37000',
            'stock' => 22
        ]);


        DB::table('spareparts')->insert([
            'category_id' => 3,
            'name' => 'Rantai roda1',
            'price' => '16000',
            'stock' => 100
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 3,
            'name' => 'Paking Kepala Silinder',
            'price' => '51000',
            'stock' => 2
        ]);

        
        DB::table('spareparts')->insert([
            'category_id' => 3,
            'name' => 'Gir Depan',
            'price' => '23000',
            'stock' => 64
        ]);

        
        DB::table('spareparts')->insert([
            'category_id' => 3,
            'name' => 'Bohlam Lampu Depan',
            'price' => '8000',
            'stock' => 12
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 3,
            'name' => 'Saringan Udara',
            'price' => '46000',
            'stock' => 50
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 3,
            'name' => 'Rocker Arm',
            'price' => '76000',
            'stock' => 2
        ]);
      
        DB::table('spareparts')->insert([
            'category_id' => 3,
            'name' => 'Relay Starterx',
            'price' => '47000',
            'stock' => 16
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 4,
            'name' => 'Kampas Rem Depan Belakang',
            'price' => '130000',
            'stock' => 50
        ]);


        DB::table('spareparts')->insert([
            'category_id' => 4,
            'name' => 'Bohlam Lampu Sein',
            'price' => '27000',
            'stock' => 16
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 4,
            'name' => 'Gasket Karburator',
            'price' => '78000',
            'stock' => 9
        ]);

        
        DB::table('spareparts')->insert([
            'category_id' => 4,
            'name' => 'Paking Kopling (per buah)',
            'price' => '70000',
            'stock' => 5
        ]);

        
        DB::table('spareparts')->insert([
            'category_id' => 4,
            'name' => 'Bohlam Lampu Depan',
            'price' => '20000',
            'stock' => 10
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 4,
            'name' => 'Piston',
            'price' => '55000',
            'stock' => 29
        ]);

        DB::table('spareparts')->insert([
            'category_id' => 4,
            'name' => 'Kabel Gas',
            'price' => '84000',
            'stock' => 7
        ]);
      
        DB::table('spareparts')->insert([
            'category_id' => 4,
            'name' => 'Saringan Oli',
            'price' => '12000',
            'stock' => 30
        ]);
    }
}
