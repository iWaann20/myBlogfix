<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,     
            CategorySeeder::class, 
            MenuSeeder::class,
        ]);

        $users = User::factory(20)->create();
        $categories = Category::all();

        if ($categories->count() > 0 && $users->count() > 0) {
            Post::factory(100)->recycle($categories->merge($users))->create();
        } else {
            $this->command->warn('Skipping Post seeding because there are no categories or users.');
        }
    }
}
