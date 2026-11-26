<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Product photos are bundled as placeholder/dummy images under
     * database/seeders/images/products/. They are copied into the
     * "public" storage disk so the app never depends on internet
     * access just to have a fully-populated catalog after seeding.
     */
    public function run(): void
    {
        $ikan = Category::where('slug', 'olahan-ikan')->firstOrFail();
        $camilan = Category::where('slug', 'camilan-dimsum')->firstOrFail();
        $lauk = Category::where('slug', 'lauk-nusantara')->firstOrFail();

        $products = [
            [
                'category_id' => $camilan->id,
                'name' => 'Pempek Lenjer & Kapal Selam Beku',
                'price' => 45000,
                'weight_gram' => 500,
                'stock' => 40,
                'description' => "Pempek khas Palembang dari ikan tenggiri pilihan, berisi varian lenjer dan kapal selam (telur). Dibekukan segar tanpa bahan pengawet.\n\nSaran penyajian: rebus/kukus pempek beku selama 10-12 menit atau goreng langsung tanpa dicairkan terlebih dahulu hingga mengapung dan berwarna keemasan, sajikan dengan kuah cuko pedas manis.",
                'image_source' => 'pempek-lenjer-kapal-selam.jpg',
            ],
            [
                'category_id' => $camilan->id,
                'name' => 'Dimsum Ayam Udang Premium',
                'price' => 38000,
                'weight_gram' => 400,
                'stock' => 55,
                'description' => "Dimsum isi ayam dan udang segar dengan tekstur kulit lembut, dibuat tanpa MSG tambahan dan dibekukan cepat (blast freezing) untuk menjaga kualitas rasa.\n\nSaran penyajian: kukus selama 12-15 menit dalam kondisi beku hingga matang merata, sajikan hangat dengan saus sambal atau saus tiram.",
                'image_source' => 'dimsum-ayam-udang.jpg',
            ],
            [
                'category_id' => $ikan->id,
                'name' => 'Otak-Otak Ikan Tenggiri Khas Nusantara',
                'price' => 32000,
                'weight_gram' => 350,
                'stock' => 30,
                'description' => "Otak-otak ikan tenggiri asli dengan bumbu rempah khas nusantara, dibungkus daun pisang dan dibekukan untuk menjaga aroma serta kekenyalan.\n\nSaran penyajian: panggang atau goreng dengan sedikit minyak selama 8-10 menit hingga matang, sajikan bersama sambal kacang.",
                'image_source' => 'otak-otak-tenggiri.jpg',
            ],
            [
                'category_id' => $lauk->id,
                'name' => 'Nugget Ayam Kampung Tanpa Pengawet',
                'price' => 42000,
                'weight_gram' => 500,
                'stock' => 60,
                'description' => "Nugget dari daging ayam kampung asli tanpa bahan pengawet maupun pewarna buatan, cocok untuk bekal anak maupun lauk keluarga.\n\nSaran penyajian: goreng langsung dari kondisi beku dengan minyak panas sedang selama 5-7 menit hingga keemasan.",
                'image_source' => 'nugget-ayam-kampung.jpg',
            ],
            [
                'category_id' => $lauk->id,
                'name' => 'Rendang Daging Sapi Kemasan Vakum',
                'price' => 65000,
                'weight_gram' => 250,
                'stock' => 25,
                'description' => "Rendang daging sapi dimasak dengan bumbu rempah autentik hingga kering dan meresap, dikemas vakum lalu dibekukan agar tahan lama tanpa kehilangan cita rasa.\n\nSaran penyajian: rendam kemasan vakum dalam air panas selama 10 menit atau panaskan isinya di atas wajan dengan api kecil hingga hangat merata.",
                'image_source' => 'rendang-sapi-vakum.jpg',
            ],
            [
                'category_id' => $camilan->id,
                'name' => 'Cireng Rujak Bumbu Kacang Beku',
                'price' => 22000,
                'weight_gram' => 400,
                'stock' => 70,
                'description' => "Cireng (aci digoreng) renyah khas Sunda lengkap dengan bumbu rujak kacang pedas manis, dibekukan dalam kondisi siap goreng.\n\nSaran penyajian: goreng dari kondisi beku dengan minyak panas selama 4-6 menit hingga renyah kecoklatan, sajikan dengan bumbu rujak kacang yang disertakan.",
                'image_source' => 'cireng-rujak.jpg',
            ],
        ];

        $sourceDir = database_path('seeders/images/products');

        foreach ($products as $data) {
            $sourcePath = $sourceDir.'/'.$data['image_source'];
            $storedPath = 'products/'.Str::uuid().'.jpg';

            if (File::exists($sourcePath)) {
                Storage::disk('public')->put($storedPath, File::get($sourcePath));
            }

            Product::updateOrCreate(
                ['name' => $data['name']],
                [
                    'category_id' => $data['category_id'],
                    'price' => $data['price'],
                    'weight_gram' => $data['weight_gram'],
                    'stock' => $data['stock'],
                    'description' => $data['description'],
                    'image' => $storedPath,
                ]
            );
        }
    }
}
