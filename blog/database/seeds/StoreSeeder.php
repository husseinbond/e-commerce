<?php

use Illuminate\Database\Seeder;
use App\store;
class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        store::create([
            'name'=>'zara',
            'Addresses'=>'mourad basha street',
            'phones'=>'010549785',
            'times of work'=>'10am to 22pm',

        ]);
        store::create([
            'name'=>'h&m',
            'Addresses'=>'mourad basha street',
            'phones'=>'010549785',
            'times of work'=>'10am to 22pm',

        ]);
        store::create([
            'name'=>'Ras',
            'Addresses'=>'mourad basha street',
            'phones'=>'01054978',
            'times of work'=>'10am to 22pm',

        ]);
        store::create([
            'name'=>'Puth',
            'Addresses'=>'mourad basha street',
            'phones'=>'010549785',
            'times of work'=>'10am to 22pm',
        ]);
    }
}
