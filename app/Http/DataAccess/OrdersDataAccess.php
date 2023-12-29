<?php

namespace App\Http\DataAccess;

use App\Models\Orders;

use Exception;

class OrdersDataAccess
{
    public function getAll()
    {
        try {
            return Orders::select(
                'orders.*',
                'users.name',
                'users.id as user_id',
                'users.name',
                'users.phone as user_phone',
                'users.address',
                'users.state',
                'users.city',
                'users.address2',
                'users.country',
                'users.zipcode'
            )
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->get();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function updateById($id, $data)
    {
        try {
            return Orders::where('id', $id)->update($data);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
