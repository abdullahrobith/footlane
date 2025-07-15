<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categories;


class CategoriesFactory extends Factory
{
    protected $model = Categories::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->sentence(),
            // 'image' => $this->faker->imageUrl(640, 480, 'categories', true, 'Faker'),
            'created_at' => now(),//tahun bulan tanggal jam dan detik
            'updated_at' => now(),
        ];
    }
}
