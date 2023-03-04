<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
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

        $restaurants = [
            'La Pergola',
            'Sora Lella',
            'Osteria Francescana',
            'Le Calandre',
            'Il Ristorante del Borgo',
            'La Trattoria da Gino',
            'La Taverna del Vecchio Mulino',
            'La Pizzeria del Corso',
            'La Locanda della Luna',
            'Sapori d\'Oriente'
        ];

        foreach (User::all() as $key => $user) {
            $new_restaurant = new Restaurant();
            $new_restaurant->name = $restaurants[$key];
            $new_restaurant->city = $faker->state();
            $new_restaurant->street_address = $faker->streetAddress();
            $new_restaurant->postal_code = $faker->postcode();
            $new_restaurant->vat_number = $faker->numerify('###########');
            $new_restaurant->image = 'https://www.ilborghista.it/immaginiutente/attivita_foto/300_m_32915-ath0q9p5q6b3m7b3b8p7x9k3x4v9q4k5b5w3l1z1d6k5q1g6p3k7.jpg?a=9192';
            $new_restaurant->user_id = $user->id;
            $new_restaurant->slug = Str::slug($new_restaurant->name . '-' . $new_restaurant->city . '-' . $new_restaurant->postal_code);
            $new_restaurant->save();
        }
    }
}
