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
            'icon' => 'home',
            'list' => '1'
        ]);
        Menu::create([
            'name' => 'Apps',
            'route' => '#',
            'icon' => 'grid',
            'list' => '2'
        ]);
        Menu::create([
            'name' => 'Authentication',
            'route' => '#',
            'icon' => 'users',
            'list' => '3'
        ]);
        Menu::create([
            'menu_id' => '2',
            'name' => 'Calendar',
            'route' => '/calendar',
        ]);
        Menu::create([
            'menu_id' => '2',
            'name' => 'Chat',
            'route' => '/chat',
        ]);
        Menu::create([
            'menu_id' => '2',
            'name' => 'Email',
            'route' => '#',
        ]);
        Menu::create([
            'menu_id' => '2',
            'name' => 'Invoices',
            'route' => '#',
        ]);
        Menu::create([
            'menu_id' => '2',
            'name' => 'Contact',
            'route' => '/contact',
        ]);
        Menu::create([
            'menu_id' => '3',
            'name' => 'Verify Users',
            'route' => '/admin',
        ]);
        Menu::create([
            'parent_id' => '6',
            'name' => 'Inbox',
            'route' => '/inbox-mail',
        ]);
        Menu::create([
            'parent_id' => '6',
            'name' => 'Read Email',
            'route' => '/read-email',
        ]);
        Menu::create([
            'parent_id' => '7',
            'name' => 'Invoices List',
            'route' => '/invoices-list',
        ]);
        Menu::create([
            'parent_id' => '7',
            'name' => 'Invoices Detail',
            'route' => '/invoices-detail',
        ]);
    }
}
