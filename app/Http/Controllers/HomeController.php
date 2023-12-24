<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    public function index()
    {
        $products = ProductModel::where('id', '>', 3)->take(8)->get();

        return View::make("landing")->with(['products' => $products]);
    }

}
