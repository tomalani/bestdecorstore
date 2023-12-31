<?php

namespace App\Http\DataAccess;

use App\Models\Orders;
use App\Models\OrdersItem;
use Exception;

class OrderItemsDataAccess
{
    public function getItemByOrderId($id)
    {
        try {
            return OrdersItem::leftJoin('products', 'products.id', '=', 'order_items.product_id')
                ->where('order_items.order_id', '=', $id)
                ->get();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
