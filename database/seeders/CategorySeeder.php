<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Olahan Ikan',
                'description' => 'Produk frozen food berbahan dasar ikan dan hasil laut pilihan, diolah dan dibekukan cepat untuk menjaga kesegaran.',
            ],
            [
                'name' => 'Camilan & Dimsum',
                'description' => 'Aneka camilan dan dimsum beku siap goreng/kukus, cocok untuk stok camilan keluarga maupun jualan.',
            ],
            [
                'name' => 'Lauk Nusantara',
                'description' => 'Lauk khas nusantara yang dikemas vakum dan dibekukan, praktis dipanaskan kapan saja tanpa mengurangi cita rasa asli.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                ]
            );
        }
    }
}
