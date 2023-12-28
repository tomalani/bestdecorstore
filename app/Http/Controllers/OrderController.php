<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Http\DataAccess\OrderItemsDataAccess;
use App\Http\DataAccess\OrdersDataAccess;
use App\Models\Orders;
use App\Models\OrdersItem;
use App\Models\Users;
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

    public function checkout()
    {
        $content = Cart::content();
        $total = Cart::total();
        return view('cart.checkout')->with([
            'content' => $content,
            'total' => $total
        ]);
    }

    public function orderSave(Request $request)
    {
        $content = Cart::content();
        $total = Cart::total();
        // dd($content);
        // dd($request->all());
        $user_insert = Users::insertGetId([
            'name' => $request->firstname . ' ' . $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'address2' => $request->address2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country_selector,
            'zipcode' => $request->zipcode,
            'role' => 0,
            'created_at' => \Carbon\Carbon::now(),
        ]);
        $order_insert = Orders::insertGetId([
            'user_id' => $user_insert,
            'status' => 1,
            'order_number' => now()->format('YmdHis') . mt_rand(10, 99),
            'created_at' => \Carbon\Carbon::now(),
        ]);
        foreach($content as $key => $item) {
            OrdersItem::insert([
                'order_id' => $order_insert,
                'product_id' => $key,
                'quantity' => $item['quantity'],
                'created_at' => \Carbon\Carbon::now(),
            ]);
        }
        if ($order_insert) { // insert success then return ID
            // redirect with message
            return response()->json([
                'status' => "Success",
                'message' => "Updated successfully"
            ]);
        } else { // insert fail
            return response()->json([
                'status' => "Fail",
                'message' => "Updated fail"
            ]);
        }
    }

    public function orderSuccess()
    {
        Cart::clear();
        return redirect()->route('home');
    }
}
