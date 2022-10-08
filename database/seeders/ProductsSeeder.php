<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //\App\Models\Product::factory(100)->create();


        DB::table('products')->insert([
            'title' => 'Jacket',
            'description' => 'Given Jacket Description',
            'currency' => 'PHP',
            'price'=> 1234.56,
            'brand'=> 'KuyaWill',
            'category' => 'apparel',
            'image' => 'https://netstorage-kami.akamaized.net/images/0fgjhs1shmj74jpi4g.jpg?&imwidth=1200'
        ]);

        DB::table('products')->insert([
            'title' => 'Six of Crows',
            'description' => 'No mourners, no funerals',
            'currency' => 'PHP',
            'price'=> 1500.06,
            'brand'=> 'Crows',
            'category' => 'book',
            'image' => 'https://kbimages1-a.akamaihd.net/282ff884-0dba-480a-bf09-0ea4464b7df1/1200/1200/False/six-of-crows.jpg'
        ]);

        DB::table('products')->insert([
            'title' => 'Samsung Galaxy A20',
            'description' => 'Electronic Device',
            'currency' => 'PHP',
            'price'=> 2500.00,
            'brand'=> 'Samsung',
            'category' => 'device',
            'image' => 'https://images.samsung.com/is/image/samsung/pk-feature-minimal-design-that-s-easy-on-the-eyes-155186266?$FB_TYPE_A_MO_JPG$'
        ]);
    }
}
