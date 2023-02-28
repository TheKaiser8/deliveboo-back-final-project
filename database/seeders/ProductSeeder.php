<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Schema::enableForeignKeyConstraints();

        $products = [
            ['name' => 'Pizza margherita', 'typology' => 'pizza'],
            ['name' => 'Hamburger', 'typology' => 'panini'],
            ['name' => 'Cheeseburger', 'typology' => 'panini'],
            ['name' => 'Lasagne', 'typology' => 'pasta'],
            ['name' => 'Polenta', 'typology' => 'contorni'],
            ['name' => 'Calzone farcito', 'typology' => 'pizza'],
            ['name' => 'Insalata di pollo', 'typology' => 'insalate'],
            ['name' => 'Pizza capricciosa', 'typology' => 'pizza'],
            ['name' => 'Sgombro al forno', 'typology' => 'pesce'],
            ['name' => 'Panino vegano', 'typology' => 'panini'],
            ['name' => 'Panino vegetariano al formaggio', 'typology' => 'panini'],
            ['name' => 'Formaggio grigliato', 'typology' => 'contorni'],
            ['name' => 'Torta paradiso', 'typology' => 'dessert'],
            ['name' => 'Tiramisù', 'typology' => 'dessert'],
            ['name' => 'Hot Dog', 'typology' => 'panini'],
            ['name' => 'Caprese', 'typology' => 'insalate'],
            ['name' => 'Spaghetti al ragù', 'typology' => 'pasta'],
            ['name' => 'Cannelloni', 'typology' => 'pasta'],
            ['name' => 'Bucatini all\'amatriciana', 'typology' => 'pasta'],
            ['name' => 'Fusilli alla norma', 'typology' => 'pasta'],
            ['name' => 'Paccheri allo scoglio', 'typology' => 'pesce'],
            ['name' => 'Carpaccio di tonno', 'typology' => 'pesce'],
            ['name' => 'Branzino alla griglia', 'typology' => 'pesce'],
            ['name' => 'Sushi misto', 'typology' => 'sushi'],
            ['name' => 'Sashimi di salmone', 'typology' => 'sushi'],
            ['name' => 'Nigiri di gamberi', 'typology' => 'sushi'],
            ['name' => 'Uramaki California', 'typology' => 'sushi'],
            ['name' => 'Insalata greca', 'typology' => 'insalate'],
            ['name' => 'Insalata caprese', 'typology' => 'insalate'],
            ['name' => 'Insalata di mare', 'typology' => 'insalate'],
            ['name' => 'Parmigiana di melanzane', 'typology' => 'contorni'],
            ['name' => 'Zucchine alla scapece', 'typology' => 'contorni'],
            ['name' => 'Carciofi alla romana', 'typology' => 'contorni'],
            ['name' => 'Cotoletta alla milanese', 'typology' => 'secondi'],
            ['name' => 'Coca-Cola', 'typology' => 'bevande'],
            ['name' => 'Acqua naturale', 'typology' => 'bevande'],
            ['name' => 'Fanta', 'typology' => 'bevande'],
            ['name' => 'Acqua frizzante', 'typology' => 'bevande'],
            ['name' => 'Birra', 'typology' => 'bevande'],
            ['name' => 'Sprite', 'typology' => 'bevande'],
            ['name' => 'Tè freddo', 'typology' => 'bevande'],
            ['name' => 'Caffè', 'typology' => 'bevande'],
            ['name' => 'Succhi di frutta', 'typology' => 'bevande'],
            ['name' => 'Vino rosso', 'typology' => 'bevande'],
        ];

        $max_products_per_restaurant = 10;

        foreach (Restaurant::all() as $restaurant) {
            $products_added = 0;
            $shuffled_products = $products;
            shuffle($shuffled_products);
            foreach ($shuffled_products as $product) {
                if ($products_added >= $max_products_per_restaurant) {
                    break; // esci dal ciclo se il numero massimo di prodotti è stato raggiunto
                }
                $new_product = new Product();
                $new_product->name = $product['name'];
                $new_product->is_available = $faker->numberBetween(0, 1);
                $new_product->image = $faker->imageUrl(640, 480, 'food', true);
                $new_product->typology = $product['typology'];
                $new_product->description = $faker->paragraph(2);
                $new_product->ingredients = $faker->paragraph(1);
        
                switch ($product['typology']) {
                    case 'pizza':
                        $new_product->price = $faker->randomFloat(2, 5, 15);
                        break;
                    case 'panini':
                        $new_product->price = $faker->randomFloat(2, 3, 10);
                        break;
                    case 'pasta':
                        $new_product->price = $faker->randomFloat(2, 7, 20);
                        break;
                    case 'contorni':
                        $new_product->price = $faker->randomFloat(2, 2, 7);
                        break;
                    case 'insalate':
                        $new_product->price = $faker->randomFloat(2, 4, 12);
                        break;
                    case 'pesce':
                        $new_product->price = $faker->randomFloat(2, 10, 25);
                        break;
                    case 'sushi':
                        $new_product->price = $faker->randomFloat(2, 8, 18);
                        break;
                    case 'secondi':
                        $new_product->price = $faker->randomFloat(2, 10, 30);
                        break;
                    case 'bevande':
                        $new_product->price = $faker->randomFloat(2, 10, 10);
                        break;
                    default:
                        $new_product->price = $faker->randomFloat(2, 5, 15);
                }
        
                $new_product->restaurant_id = $restaurant->id;
                $new_product->save();
                $products_added++;
            }
        }
    }    
}
