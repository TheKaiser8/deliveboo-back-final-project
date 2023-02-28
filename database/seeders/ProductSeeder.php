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
            ['name' => 'Pizza margherita', 'typology' => 'pizza', 'image'=>'https://www.unmondodisapori.it/wp-content/uploads/2017/10/margherita.jpg'],
            ['name' => 'Hamburger', 'typology' => 'panini', 'image' => 'https://media-assets.lacucinaitaliana.it/photos/61fae7f75f740bfb879f54e8/16:9/w_2560%2Cc_limit/iStock-636305290.jpg'],
            ['name' => 'Cheeseburger', 'typology' => 'panini', 'image' => 'https://imagesvc.meredithcorp.io/v3/mm/image?q=60&c=sc&poi=face&w=750&h=375&url=https%3A%2F%2Fassets.marthastewart.com%2Fstyles%2Fwmax-750%2Fd51%2Fburger-lettuce-tomato-pickle-cheese-06167-102941304%2Fburger-lettuce-tomato-pickle-cheese-06167-102941304_horiz.jpg%3Fitok%3DRijLVxLi'],
            ['name' => 'Lasagne', 'typology' => 'pasta', 'image' => 'https://wips.plug.it/cips/buonissimo.org/cms/2011/12/lasagne-al-forno-alla-ferrarese.jpg'],
            ['name' => 'Polenta', 'typology' => 'contorni', 'image' => 'https://cdn.ilclubdellericette.it/wp-content/uploads/2017/06/polenta-790x500.jpg'],
            ['name' => 'Calzone farcito', 'typology' => 'pizza', 'image' => 'https://www.buttalapasta.it/wp-content/uploads/calzone-farcito1.jpg'],
            ['name' => 'Insalata di pollo', 'typology' => 'insalate', 'image' => 'https://www.cucchiaio.it/content/cucchiaio/it/ricette/2019/06/insalata-di-pollo/_jcr_content/header-par/image-single.img.jpg/1560261890876.jpg'],
            ['name' => 'Pizza capricciosa', 'typology' => 'pizza', 'image' => 'https://i0.wp.com/www.piccolericette.net/piccolericette/wp-content/uploads/2017/12/3240_Pizza.jpg?resize=895%2C616&ssl=1'],
            ['name' => 'Sgombro al forno', 'typology' => 'pesce', 'image' => 'https://images.fidhouse.com/fidelitynews/wp-content/uploads/sites/6/2017/10/1508853359_23c674c09f2ce225dae8ba406b91bb34a0626af9-1508852927.jpg?w=580'],
            ['name' => 'Panino vegano', 'typology' => 'panini', 'image' => 'https://www.vegolosi.it/wp-content/uploads/2016/07/sandwich-1051605_960_720.jpg'],
            ['name' => 'Panino vegetariano al formaggio', 'typology' => 'panini', 'image' => 'https://i2.wp.com/www.piccolericette.net/piccolericette/wp-content/uploads/2016/05/1899_Toast.jpg?resize=895%2C616&ssl=1'],
            ['name' => 'Formaggio grigliato', 'typology' => 'contorni', 'image' => 'https://wips.plug.it/cips/paginegialle.it/magazine/cms/2018/09/formaggio-piastra-800.jpg?w=744&h=418&a=c'],
            ['name' => 'Torta paradiso', 'typology' => 'dessert', 'image' => 'https://staticfanpage.akamaized.net/wp-content/uploads/sites/21/2021/11/Torta-paradiso-finale-4-1200x675.jpg'],
            ['name' => 'Tiramisù', 'typology' => 'dessert', 'image' => 'https://primochef.it/wp-content/uploads/2019/06/SH_tiramisu.jpg'],
            ['name' => 'Hot Dog', 'typology' => 'panini', 'image' => 'https://www.negroni.com/sites/negroni.com/files/styles/scale__1440_x_1440_/public/hot_dog.jpg?itok=qOopsgox'],
            ['name' => 'Caprese', 'typology' => 'insalate', 'image' => 'https://cdn.ilclubdellericette.it/wp-content/uploads/2018/04/ricetta-insalata-caprese-790x500.jpg'],
            ['name' => 'Spaghetti al ragù', 'typology' => 'pasta', 'image' => 'https://www.spadellandia.it/upload/ricette/Spaghetti-al-ragu-toscano_8496.jpg'],
            ['name' => 'Cannelloni', 'typology' => 'pasta', 'image' => 'https://www.giallozafferano.it/images/12-1287/Cannelloni_650x433_wm.jpg'],
            ['name' => 'Bucatini all\'amatriciana', 'typology' => 'pasta', 'image' => 'http://cdn.cook.stbm.it/thumbnails/ricette/1/1198/hd750x421.jpg'],
            ['name' => 'Fusilli alla norma', 'typology' => 'pasta', 'image' => 'https://staritprodcdnimages3.azureedge.net/files/styles/recipe_main_image_mobile/windowsazurestorage/recipes/15498301496c9434199fe5a10f69ca05b90a14a0c5.jpg?h=289976fd&itok=7U1mQyP-'],
            ['name' => 'Paccheri allo scoglio', 'typology' => 'pesce', 'image' => 'https://d15j9y5wlusr11.cloudfront.net/filer_public_thumbnails/filer_public/57/fa/57faebdb-c8ae-48e1-93c6-50b62558d121/ricetta.png__1200x1200_q80_ALIAS-extra_large_crop-smart_subsampling-2.jpg'],
            ['name' => 'Carpaccio di tonno', 'typology' => 'pesce', 'image' => 'https://www.fragolosi.it/wp-content/foto-ricetta/2017/03/Carpaccio-di-Tonno.jpg'],
            ['name' => 'Branzino alla griglia', 'typology' => 'pesce', 'image' => 'https://primochef.it/wp-content/uploads/2016/09/SH_branzino_alla_griglia-640x350.jpg.webp'],
            ['name' => 'Sushi misto', 'typology' => 'sushi', 'image' => 'https://img.freepik.com/premium-photo/mixed-sushi-roll-salmon-sashimi_90251-918.jpg?w=2000'],
            ['name' => 'Sashimi di salmone', 'typology' => 'sushi', 'image' => 'https://sushi.roma.it/wp-content/uploads/2018/02/sashimi.jpg'],
            ['name' => 'Nigiri di gamberi', 'typology' => 'sushi', 'image' => 'https://www.sushiacasa.it/wp-content/uploads/2018/07/nigiri-ebi.jpg'],
            ['name' => 'Uramaki California', 'typology' => 'sushi', 'image' => 'https://www.mauroianassi.it/img_up/big/20210301172759-166.jpg'],
            ['name' => 'Insalata greca', 'typology' => 'insalate', 'image' => 'https://www.finedininglovers.it/sites/g/files/xknfdk1106/files/styles/recipes_1200_800_fallback/public/fdl_content_import_it/insalata-greca-originale.jpg?itok=9noS6bYi'],
            ['name' => 'Insalata caprese', 'typology' => 'insalate', 'image' => 'https://www.donnamoderna.com/content/uploads/2004/09/insalata-alla-caprese-830x625.jpg'],
            ['name' => 'Insalata di mare', 'typology' => 'insalate', 'image' => 'https://www.fornellidisicilia.it/wp-content/uploads/2019/07/insalata-siciliana-di-mare.jpg'],
            ['name' => 'Parmigiana di melanzane', 'typology' => 'contorni', 'image' => 'https://www.chiarapassion.com/wp-content/uploads/2014/05/parmigiana-di-melanzane-7.jpg'],
            ['name' => 'Zucchine alla scapece', 'typology' => 'contorni', 'image' => 'https://wips.plug.it/cips/buonissimo.org/cms/2012/04/zucchine-alla-scapece.jpg?w=712&a=c&h=406'],
            ['name' => 'Carciofi alla romana', 'typology' => 'contorni', 'image' => 'https://images2.corriereobjects.it/methode_image/2022/02/03/Cucina/Foto%20Cucina%20-%20Trattate/carciofi%20alla%20romana-kpHB-U3320541735061ESG-678x508@Corriere-Web-Sezioni.jpg?v=202202070607'],
            ['name' => 'Cotoletta alla milanese', 'typology' => 'secondi', 'image' => 'https://www.tavolartegusto.it/wp/wp-content/uploads/2022/05/Cotoletta-alla-milanese.jpg'],
            ['name' => 'Coca-Cola', 'typology' => 'bevande', 'image' => 'https://www.cicalia.com/it/img/imgproducts/19620/l_19620.jpg'],
            ['name' => 'Acqua naturale', 'typology' => 'bevande', 'image' => 'https://sfiziedeliziepalermo.com/wp-content/uploads/2020/06/acqua-san-benedetto-naturale-50-cl.jpg'],
            ['name' => 'Fanta', 'typology' => 'bevande', 'image' => 'https://www.numeriprimishop.it/113648-large_default/fanta-lattina-cl33.jpg'],
            ['name' => 'Acqua frizzante', 'typology' => 'bevande', 'image' => 'https://static.sushilabroma.it/i/2018/03/acqua-frizzante-500ml.jpg'],
            ['name' => 'Birra', 'typology' => 'bevande', 'image' => 'https://www.youdreamitaly.com/software/immagini/0000000019745_medium.jpg'],
            ['name' => 'Sprite', 'typology' => 'bevande', 'image' => 'https://www.yumatest.it/bevifacilenew/wp-content/uploads/2020/03/sprite-33.jpg'],
            ['name' => 'Tè freddo', 'typology' => 'bevande', 'image' => 'https://www.centrodistribuzionebevande.it/wp-content/uploads/2023/02/BI026_362.jpg'],
            ['name' => 'Caffè', 'typology' => 'bevande', 'image' => 'https://www.medicalfacts.it/wp-content/uploads/2020/07/bigstock-Close-up-And-Top-View-Of-Hot-B-350989136-900x580.jpg'],
            ['name' => 'Succhi di frutta', 'typology' => 'bevande', 'image' => 'https://www.ciboitalianocontadino.com/wp-content/uploads/2015/03/succo-fruttapiu-pesca.jpeg'],
            ['name' => 'Vino rosso', 'typology' => 'bevande', 'image' => 'https://www.amanti.events/618-large_default/cannonau-di-sardegna-sella-mosca.jpg'],
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
                $new_product->image = $product['image'];
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
