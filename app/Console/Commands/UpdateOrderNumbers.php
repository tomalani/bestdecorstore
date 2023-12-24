<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Orders;
use Illuminate\Console\Command;

class UpdateOrderNumbers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:update-order-numbers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update order numbers in the orders table';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $orders = Orders::all();
        foreach ($orders as $order) {
            $order->update([
                'order_number' => now()->format('YmdHis') . mt_rand(10, 99),
            ]);
        }

        $this->info('Order numbers updated successfully.');
    }
}
