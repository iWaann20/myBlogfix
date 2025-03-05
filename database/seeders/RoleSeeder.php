<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
        Role::create([
            'name' => 'Assurance',
            'slug' => 'assurance',
        ]);
        Role::create([
            'name' => 'Wifi',
            'slug' => 'wifi',
        ]);
        Role::create([
            'name' => 'HO',
            'slug' => 'ho',
        ]);
        Role::create([
            'name' => 'SDV',
            'slug' => 'sdv',
        ]);
        Role::create([
            'name' => 'Bges',
            'slug' => 'bges',
        ]);
        Role::create([
            'name' => 'Public',
            'slug' => 'public',
        ]);
        Role::create([
            'name' => 'Fullfilment',
            'slug' => 'fulfillment',
        ]);
    }
}
