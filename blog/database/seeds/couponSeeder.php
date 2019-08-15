<?php

use Illuminate\Database\Seeder;
use App\coupon;
class couponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'ABC123',
            'type' => 'fixed',
            'value' => 3000,
        ]);
        Coupon::create([
            'code' => 'DEF456',
            'type' => 'percent',
            'percent_off' => 50,
        ]);

        Coupon::create([
            'code' => 'Dff56',
            'type' => 'percent',
            'percent_off' => 10,
        ]);
  
        Coupon::create([
            'code' => 'Daafd-56',
            'type' => 'percent',
            'percent_off' => 25,
        ]);

    }
}
