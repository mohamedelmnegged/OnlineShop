<?php

namespace Database\Seeders;

use App\Models\Product ;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'name' => 'first product',
            'description' => 'this is my first prodcut ',
            'price' => '100',
            'quantity' => '1000',
            'image'     => 'images\products\1.jpg',
            'status'    => 1
        ]);
        //
        Product::create([
            'name' => 'second product',
            'description' => 'this is my second prodcut ',
            'price' => '80',
            'quantity' => '500',
            'image'     => 'images\products\2.jpg',
            'status'    => 1
        ]);
    }
}
