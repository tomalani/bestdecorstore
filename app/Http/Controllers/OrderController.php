<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Http\DataAccess\OrderItemsDataAccess;
use App\Http\DataAccess\OrdersDataAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    private $ordersDataAccess;
    private $orderItemsDataAccess;

    public function __construct(
        OrdersDataAccess $ordersAccess,
        OrderItemsDataAccess $orderItemsAccess
    ) {
        // Data accessor
        $this->ordersDataAccess = $ordersAccess;
        $this->orderItemsDataAccess = $orderItemsAccess;
    }
    public function index()
    {
        $orders = $this->ordersDataAccess->getAll();
        return view('backend.orders.index')->with('orders', $orders);
    }
    public function ajax_order_items(Request $request)
    {
        // Retrieve the orderId from the request
        $orderId = $request->input('orderId');

        // Perform the query to get order items based on the orderId
        $orderItems = $this->orderItemsDataAccess->getItemByOrderId($orderId);
        // Return the data as JSON
        return response()->json($orderItems);
    }
    public function confirm_order(Request $request)
    {
        // Retrieve the orderId from the request
        $orderId = $request->input('order_id');
        $data = [
            'status' => 2,
        ];

        $orders = $this->ordersDataAccess->updateById($orderId, $data);
        return Redirect::to('/backend/orders');
    }
    public function shipped_order(Request $request)
    {
        // Retrieve the orderId from the request
        $orderId = $request->input('order_id');
        $data = [
            'status' => 3,
        ];

        $orders = $this->ordersDataAccess->updateById($orderId, $data);
        return Redirect::to('/backend/orders');
    }
    public function delivery_order(Request $request)
    {
        // Retrieve the orderId from the request
        $orderId = $request->input('order_id');
        $data = [
            'status' => 4,
        ];

        $orders = $this->ordersDataAccess->updateById($orderId, $data);
        return Redirect::to('/backend/orders');
    }
    public function reject_order($id)
    {
        $data = [
            'status' => 0,
        ];

        $orders = $this->ordersDataAccess->updateById($id, $data);
        return Redirect::to('/backend/orders');
    }




    // Front-end

    public function cart()
    {
        $content = Cart::content();
        return view('cart.index')->with([
            'content' => $content,
        ]);
    }
}
