<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Products;
use App\Models\Categories;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        Products::insert(
            [
                [
                    'name' => 'Nike Air Max 2021',
                    'slug' => 'nike-air-max-2021',
                    'description' => 'The Nike Air Max 2021 is a stylish and comfortable sneaker that combines modern design with classic elements. It features a breathable mesh upper, a cushioned midsole for all-day comfort, and the iconic Air Max unit for responsive cushioning. Perfect for both casual wear and athletic activities.',
                    'sku' => 'nike-air-max-2021-' . uniqid(),
                    'price' => '1000000',
                    'stock' => '10',
                    'product_category_id' => '11',
                    'image_url' => '',
                    'is_active' => $faker->boolean(80), // 80% chance of being active
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => '',
                    'slug' => '',
                    'description' => '',
                    'sku' => '' . uniqid(),
                    'price' => '',
                    'stock' => '',
                    'product_category_id' => '',
                    'image_url' => '',
                    'is_active' => $faker->boolean(80), // 80% chance of being active
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
        $this->command->info('Categories and products seeded successfully!');
    }
}
