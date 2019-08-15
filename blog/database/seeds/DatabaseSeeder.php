<?php

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

        $this->call(couponSeeder::class);
      // $this->call(ColorSeeder::class);
        $this->call(StoreSeeder::class);
       // $this->call(SizeSeeder::class);
         
    }
}
