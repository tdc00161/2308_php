<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 years');
        return [
            'img' => '/img/file'.$this->faker->randomNumber(1).'.jpg',
            'title' => $this->faker->sentence(),
            'content' => $this->faker->sentence(),
            'views' => $this->faker->randomNumber(5),
            'heart' => $this->faker->randomNumber(5),
            'category_id' => (string)$this->faker->randomNumber(1),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}

