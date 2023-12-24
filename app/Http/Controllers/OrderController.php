<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Http\DataAccess\OrdersDataAccess;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    private $ordersDataAccess;

    public function __construct(
        OrdersDataAccess $ordersAccess
    ) {
        // Data accessor
        $this->ordersDataAccess = $ordersAccess;
    }
    public function index()
    {
        $orders = $this->ordersDataAccess->getAll();
        return view('backend.orders.index')->with('orders', $orders);
    }
}
