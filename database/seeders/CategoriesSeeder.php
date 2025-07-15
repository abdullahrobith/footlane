<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::insert(
            [
                [
                    'name' => 'Nike',
                    'slug' => 'nike',
                    'description' => 'Just Do It',
                    'image' => 'https://static.vecteezy.com/system/resources/previews/010/994/232/non_2x/nike-logo-black-clothes-design-icon-abstract-football-illustration-with-white-background-free-vector.jpg'
                ],
                [
                    'name' => 'Adidas',
                    'slug' => 'adidas',
                    'description' => 'Impossible is Nothing.',
                    'image' => 'https://static.vecteezy.com/system/resources/previews/019/136/412/large_2x/adidas-logo-adidas-icon-free-free-vector.jpg'
                ],
                [
                    'name' => 'Puma',
                    'slug' => 'puma',
                    'description' => 'Forever Faster.',
                    'image' => 'https://static.vecteezy.com/ti/gratis-vektor/p1/10994431-puma-logo-schwarzes-symbol-mit-namen-kleidung-design-symbol-abstrakte-fussball-illustration-mit-weissem-hintergrund-kostenlos-vektor.jpg'
                ],
                [
                    'name' => 'Converse',
                    'slug' => 'converse',
                    'description' => 'Shoes Are Boring. Wear Sneakers.',
                    'image' => 'https://logospng.org/download/converse/converse-4096.png'
                ],
                [
                    'name' => 'New Balance',
                    'slug' => 'new balance',
                    'description' => 'Fearlessly Independent Since 1906.',
                    'image' => 'https://logolist.net/wp-content/uploads/2024/04/New-Balance-logo-vector-01.svg'
                ],
            ]
        );
    }
}
