<?php

namespace Database\Seeders;

use App\Models\Kitchen;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class KitchenRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    for($i = 1; $i <= count(Restaurant::all()); $i++){

        $restaurant = Restaurant::find($i);
        $restaurant->kitchens()->attach($i);
      
        }
        
    }
}
