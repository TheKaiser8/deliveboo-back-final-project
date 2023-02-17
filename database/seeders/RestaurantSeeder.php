<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Metodo truncate() per ripopolare da zero il seeder (Restaurant in questo caso) ogni volta che viene rilanciato
        Schema::disableForeignKeyConstraints();
        Restaurant::truncate();
        Schema::enableForeignKeyConstraints();



        $restaurants = ['La pizzeria', 'La trattoria', 'Trancio', 'Soralella', 'MC donald', 'Burger King', 'Trapezzino', 'Le calandre'];

        for ($i = 0; $i < 8; $i++) {
            $user = User::inRandomOrder()->first();

            $new_restaurant = new Restaurant();
            $new_restaurant->name = $restaurants[$i];
            $new_restaurant->address = $faker->address();
            $new_restaurant->vat_number = $faker->numerify('###########');
            $new_restaurant->image = $faker->imageUrl(640, 480, 'food', true);
            $new_restaurant->user_id = $user->id;
            $new_restaurant->save();
        }
    }
}
