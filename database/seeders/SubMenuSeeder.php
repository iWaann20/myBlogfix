<?php

namespace Database\Seeders;

use App\Models\SubMenu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubMenu::create([
            'menu_id' => '2',
            'name' => 'Calendar',
            'route' => '/calendar',
        ]);
        SubMenu::create([
            'menu_id' => '2',
            'name' => 'Chat',
            'route' => '/chat',
        ]);
        SubMenu::create([
            'menu_id' => '2',
            'name' => 'Email',
            'route' => '#',
        ]);
        SubMenu::create([
            'menu_id' => '2',
            'name' => 'Invoices',
            'route' => '#',
        ]);
        SubMenu::create([
            'menu_id' => '2',
            'name' => 'Contact',
            'route' => '/contact',
        ]);
        SubMenu::create([
            'menu_id' => '3',
            'name' => 'Verify Users',
            'route' => '/admin',
        ]);
    }
}
