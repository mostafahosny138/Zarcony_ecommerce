<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand_id' => rand(1,1000),
            'title' => $this->faker->word,
            'sku' => $this->faker->unique()->numberBetween(1000000,1000000000),
            'details' => $this->faker->text,
            'price' => $this->faker->numberBetween(10,100)
        ];
    }
}
