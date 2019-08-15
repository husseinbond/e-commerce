<?php

use Illuminate\Database\Seeder;
use App\size;
class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        size::create([
            'sizes'=>'M',
        ]);
        size::create([
            'sizes'=>'L',
        ]);
        size::create([
            'sizes'=>'XL',
        ]);
        size::create([
            'sizes'=>'XXL',
        ]);
        size::create([
            'sizes'=>'XXL',
        ]);
        size::create([
            'sizes'=>'XXXL',
        
        ]);

        size::create([
            'sizes'=>'XXXXL',
        ]);

        size::create([
            'sizes'=>'XXXXXL',
        ]);
    }
}
