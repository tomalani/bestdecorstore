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

}
