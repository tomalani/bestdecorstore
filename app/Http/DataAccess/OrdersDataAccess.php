<?php

namespace App\Http\DataAccess;

use App\Models\Orders;

use Exception;

class OrdersDataAccess
{
    public function getAll()
    {
        try {
            return Orders::get();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
