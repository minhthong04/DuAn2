<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đảm bảo giá trị slug đúng là chuỗi ngắn dùng để nhận diện
        DB::table('categories')->insert([
            ['name' => 'Thể thao', 'slug' => 'the-thao', 'show_at_nav' => 1, 'status' => 1],
            ['name' => 'Thời sự', 'slug' => 'thoi-su', 'show_at_nav' => 1, 'status' => 1],
            ['name' => 'Quốc tế', 'slug' => 'quoc-te', 'show_at_nav' => 1, 'status' => 1]
        ]);
    }
}
