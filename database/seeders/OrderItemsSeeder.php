<?php

namespace Database\Seeders;

use App\Models\OrdersItem;
use Illuminate\Database\Seeder;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrdersItem::factory(40)->create();
    }
}
