<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Customer Beta',
            'email' => 'beta@gmail.com',
            'password' => \Hash::make('12341234')
        ]);

        \App\Models\User::create([
            'name' => 'Customer Alpha',
            'email' => 'alpha@gmail.com',
            'password' => \Hash::make('12341234')
        ]);

        \App\Models\Product::create([
            'category' => 'Tas Pria',
            'name' => 'Tas Selempang Torch Nikaho Caviar Black / Sling Bag Torch / Tas Pria',
            'slug' => Str::slug('Tas Selempang Torch Nikaho Caviar Black / Sling Bag Torch / Tas Pria', '-'),
            'price' => 259000,
            'qty' => 59,
            'qty_remain' => 59,
            'image' => 'images/torch_bag.webp',
            'description' => 'TasSelempangPria|Keren|Hits|Promo|Diskon|Baru|Top|New|Best|Hot|Laris|Bagus|Good|

TORCH NIKAHO CAVIAR BLACK

Buat kamu yang suka pake tas simple dan minimalis, pasti suka nih sama tas baru dari Torch, Nikaho sling bag. Terdiri dari kompartemen utama yang bisa menyimpan barang-barang bawaan kamu dan juga terdapat saku kecil di bagian depan tas. Dilengkapi dengan adjustable strap yang bisa kamu atur ukurannya, juga ada removable shoulder strap yang berfungsi untuk membuat pundak kamu tetap nyaman saat menggunakan Nikaho sling bag. Nikaho sling bag cocok banget untuk kamu yang gak suka bawa barang terlalu banyak.'
        ]);


        \App\Models\Product::create([
            'category' => 'Gadget',
            'name' => 'Xiaomi POCO F4',
            'slug' => Str::slug('Xiaomi POCO F4', '-'),
            'price' => 5199000,
            'qty' => 17,
            'qty_remain' => 17,
            'image' => 'images/poco_f4.jpeg',
            'description' => 'Snapdragon® 870 dengan 5G Layar 6,67” AMOLED 120Hz Kamera utama 64MP dengan OIS Pengisian daya turbo 67W'
        ]);



        \App\Models\Product::create([
            'category' => 'Jacket',
            'name' => 'Jacket Hoodie Descente original',
            'slug' => Str::slug('Jacket Hoodie Descente original', '-'),
            'price' => 499000,
            'qty' => 119,
            'qty_remain' => 119,
            'image' => 'images/hoodie.jpeg',
            'description' => 'warna grey'
        ]);


        for ($i = 1; $i <= 3; $i++) {
            \App\Models\Banner::create([
                'permalink' => 'www.google.com',
                'image' => 'banner/banner_' . ($i) .'.png'
            ]);
        }


    }
}
