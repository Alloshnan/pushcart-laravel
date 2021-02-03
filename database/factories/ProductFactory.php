<?php

namespace Database\Factories;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(16),
            'description' => $this->faker->text(255),
            'price' => $this->faker->randomNumber(4),
            'catalog_id' => rand(1,Catalog::all()->count()),
        ];
    }
}
