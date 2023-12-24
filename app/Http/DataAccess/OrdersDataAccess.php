<?php

namespace App\Http\DataAccess;

use App\Models\Orders;

use Exception;

class OrdersDataAccess
{
    public function getAll()
    {
        try {
            return Orders::leftJoin('users', 'users.id', '=', 'orders.user_id')->get();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
