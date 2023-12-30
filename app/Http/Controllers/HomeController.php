<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    public function index()
    {
        $product_hightlights = ProductModel::where('is_highlight', 1)->take(3)->get();
        $products = ProductModel::where('id', '>', 3)->take(8)->get();

        return View::make("landing")->with([
            'products' => $products,
            'product_hightlights' => $product_hightlights,
        ]);
    }

    public function shop()
    {
        $products = ProductModel::orderBy('id', 'asc')->get();

        return View::make("shop")->with([
            'products' => $products,
        ]);
    }

    public function shopDetail($id)
    {
        $product = ProductModel::where('id', $id)->first();
        $relate_products = ProductModel::where('id', '<>', $id)->inRandomOrder()->limit(3)->get();

        return View::make("shop_detail")->with([
            'product' => $product,
            'relateProducts' => $relate_products,
        ]);
    }

}
