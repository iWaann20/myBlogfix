<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name' => 'Dashboard',
            'route' => '/',
            'icon' => 'home'
        ]);
        Menu::create([
            'name' => 'Apps',
            'route' => '#',
            'icon' => 'grid'
        ]);
        Menu::create([
            'name' => 'Authentication',
            'route' => '#',
            'icon' => 'users'
        ]);
    }
}
