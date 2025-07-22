<?php

namespace Database\Factories;

use App\Models\WebSite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WebSite>
 */
class WebSiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'url' => $this->faker->url,
        ];
    }
}
