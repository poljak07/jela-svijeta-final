<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Listing;

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

    protected $model = Listing::class;

    public function definition(): array
    {
        $locales = (array)config('translatable.locales');

        $out = [];
        foreach ($locales as $locale) {
            $out[$locale] = [
                'title' => $this->faker->sentence(10),
                'tags' => $this->randX(),
                'category' => $this->randX(),
                'description' => $this->faker->sentence(45),
            ];
        }

        return $out;
    }

    protected function randX() {
        $list = [];
        for ($i = 0; $i < 5; $i++) {
            $list[] = $this->faker->word;
        }
        return implode(',', $list);
    }
}
