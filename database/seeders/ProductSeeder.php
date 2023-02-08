<?php

namespace Database\Seeders;

use App\Models\Product;
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
        for($i = 1; $i<=12 ;$i++){
            Product::create([
                'name' => "Vegetable $i",
                'description' => "LIMITED VEGETABLE! \nVegetables are parts of plants that are consumed by others human or other animals as food \nNotes: This Vegetable Lose at Canna UK Vegetables Championship",
                'price' => 1000000,
            ]);
        }
    }
}
