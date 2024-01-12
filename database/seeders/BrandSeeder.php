<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'image' => 'http://localhost:8000/storage/images/brands/1669659177.jpg',
            'file_name' => '1669659177.jpg',
            'name_tm' => 'adidas',
            'name_ru' => 'adidas',
            'name_en' => 'adidas',
            'slug' => 'adidas',
        ]);
        Brand::create([
            'image' => 'http://localhost:8000/storage/images/brands/1669659177.jpg',
            'file_name' => '1669659177.jpg',
            'name_tm' => 'adidas',
            'name_ru' => 'adidas',
            'name_en' => 'adidas',
            'slug' => 'adidas',
        ]);
        Brand::create([
            'image' => 'http://localhost:8000/storage/images/brands/1669659177.jpg',
            'file_name' => '1669659177.jpg',
            'name_tm' => 'adidas',
            'name_ru' => 'adidas',
            'name_en' => 'adidas',
            'slug' => 'adidas',
        ]);
        Brand::create([
            'image' => 'http://localhost:8000/storage/images/brands/1669659177.jpg',
            'file_name' => '1669659177.jpg',
            'name_tm' => 'adidas',
            'name_ru' => 'adidas',
            'name_en' => 'adidas',
            'slug' => 'adidas',
        ]);
    }
}
