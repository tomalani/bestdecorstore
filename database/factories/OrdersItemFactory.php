<?php

namespace Database\Factories;

use App\Models\Orders;
use App\Models\OrdersItem;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrdersItemFactory extends Factory
{
    protected $model = OrdersItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => function () {
                return Orders::all()->random()->id;
            },
            'product_id' => function () {
                return Products::all()->random()->id;
            },
            'quantity' => mt_rand(1, 1000),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
