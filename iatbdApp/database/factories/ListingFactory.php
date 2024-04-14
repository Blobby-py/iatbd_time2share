<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" =>$this->faker->sentence(),
            "tags" => "tag1, tag2, tag3",
            "product" => $this->faker->name(),
            "location" => $this->faker->city(),
            "email" => $this->faker->email(),
            "description" => $this->faker->paragraph(6)
        ];
    }
}
