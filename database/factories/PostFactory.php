<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create('id_ID');

        return [
            'title' => $faker->sentence(),
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => Str::slug(fake()->sentence()),
            'body' =>  $faker->paragraphs(3,true)
        ];
    }
}