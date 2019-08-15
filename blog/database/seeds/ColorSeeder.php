<?php

use Illuminate\Database\Seeder;
use App\color;
class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        color::create([
            'colors'=>'Red',
        ]);

        color::create([
            'colors'=>'Tellow',
        ]);


        color::create([
            'colors'=>'Green',
        ]);

        color::create([
            'colors'=>'Gray',

            
        ]);

        color::create([
            'colors'=>'black',
            
            
        ]);

        color::create([
            'colors'=>'pink',
            
            
        ]);

        
        color::create([
            'colors'=>'purple',
            
            
        ]);

    }
}
