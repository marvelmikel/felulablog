<?php

namespace Database\Factories;

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
        return [
            'category_id' => fake()->numberBetween(1,3),
            'body' => $this->faker->paragraphs(15, true),
            'title' => $this->faker->sentence(15),
            'excerpt' => $this->faker->sentences(3, true),
            'featured_image' => fake()->image('public/storage/images',640,480, 'null',false, true, 'Faker'),
            'published_date' => $this->faker->date(),
            'user_id' => fake()->numberBetween(1,3), // 5 test users
        ];
    }

    /* Indicates the post is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function published()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_published' => true,
                'published_date' => now(),
            ];
        });
    }
}
