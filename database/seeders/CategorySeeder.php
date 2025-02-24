<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'red'
        ]);
        Category::create([
            'name' => 'Data Structure',
            'slug' => 'data-structure',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Front-End WebDev',
            'slug' => 'front-end-webdev',
            'color' => 'yellow'
        ]);
        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
            'color' => 'green'
        ]);
    }
}
