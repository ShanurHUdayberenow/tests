<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shopId' => Shop::inRandomOrder()->first()->id,
            'productId' => Product::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(10, 100),
            'price' => $this->faker->numberBetween(2000, 10000),
            'priceRateCurrency' => $this->faker->numberBetween(30, 500)
        ];
    }
}
