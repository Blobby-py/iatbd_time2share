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
        $tags = ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"];
        $amount = rand(1, 4); // Kies een willekeurig aantal tussen 1 en 4
        $maxOccurrences = 3; // Maximale aantal keren dat een tag kan voorkomen
        $displayedTags = [];

        // Selecteer willekeurige tags
        while (count($displayedTags) < $amount) {
            $randomTagIndex = array_rand($tags);
            $randomTag = $tags[$randomTagIndex];

            // Controleer of de tag al aanwezig is in $displayedTags
            if (!in_array($randomTag, $displayedTags)) {
                // Controleer of de tag al maximaal $maxOccurrences keer is toegevoegd
                if (count(array_keys($displayedTags, $randomTag)) <= $maxOccurrences) {
                    $displayedTags[] = $randomTag;
                }
            }
        }

        $toString = implode(",", $displayedTags);


        return [
            "title" => $this->faker->sentence(),
            "tags" => $toString,
            "product" => $this->faker->name(),
            "location" => $this->faker->city(),
            "email" => $this->faker->email(),
            "description" => $this->faker->paragraph(6)
        ];
    }
}
