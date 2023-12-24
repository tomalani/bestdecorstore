<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\DataAccess\ProductsDataAccess;
use App\Http\DataAccess\CategoriesDataAccess;
use DateTime;

class ProductsController extends Controller
{
    private $productsDataAccess;
    private $categoriesDataAccess;

    public function __construct(
        ProductsDataAccess $productsAccess,
        CategoriesDataAccess $categoriesAccess,
    ) {
        // Data accessor
        $this->productsDataAccess = $productsAccess;
        $this->categoriesDataAccess = $categoriesAccess;
    }

    public function index()
    {
        $products = $this->productsDataAccess->getAll();
        return view('backend.products.index')->with('products', $products);
    }
    public function add()
    {
        $categories = $this->categoriesDataAccess->getAll();
        return view('backend.products.add')->with('categories', $categories);
    }
    public function insert(Request $request)
    {
        $product_name = $request->input('product_name');
        $product_description = $request->input('product_description');
        $price = $request->input('price');
        $product_code = $request->input('product_code');
        $category_id = $request->input('category_id');


        // check existing
        $e = $this->productsDataAccess->isExistName($product_name);
        if ($e > 0) {
            return Redirect::to("/backend/products/add")
                ->withInput()
                ->with("messageFail", "Fail")
                ->with("messageDetail", 'Name already exist');
        }

        // prepared data
        $data = [
            'product_name' => $product_name,
            'product_description' => $product_description,
            'price' => $price,
            'product_code' => $product_code,
            'category_id' => $category_id,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];

        // insert to database
        $result = $this->productsDataAccess->insert($data);

        if ($result > 0) { // insert success then return ID
            // redirect with message
            return Redirect::to('/backend/products')
                ->with("messageSuccess", "Successfully")
                ->with("messageDetail", 'Create Successfully');
        } else { // insert fail
            return Redirect::to("/backend/products/add")
                ->withInput()
                ->with("messageFail", "Failed")
                ->with("messageDetail", 'Create Failed');
        }
    }
    public function edit($id)
    {
        $products = $this->productsDataAccess->getById($id);
        $categories = $this->categoriesDataAccess->getAll();
        return view('backend.products.edit')->with('products', $products)->with('categories', $categories);
    }
    public function delete($id)
    {
        $products = $this->productsDataAccess->delete($id);
        if ($products) {
            // redirect with message
            return Redirect::to('/backend/products')
                ->with("messageSuccess", "Successfully")
                ->with("messageDetail", 'Delete Successfully');
        } else {
            return Redirect::to("/backend/products")
                ->withInput()
                ->with("messageFail", "Failed")
                ->with("messageDetail", 'Delete Failed');
        }
        return Redirect::to('/backend/products');
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $product_name = $request->input('product_name');
        $product_description = $request->input('product_description');
        $price = $request->input('price');
        $product_code = $request->input('product_code');
        $category_id = $request->input('category_id');

        // check existing
        $e = $this->productsDataAccess->isExistName($product_name);
        if ($e > 0) {
            return Redirect::to("/backend/products/edit")
                ->withInput()
                ->with("messageFail", "Fail")
                ->with("messageDetail", 'Name already exist');
        }

        // prepared data
        $data = [
            'product_name' => $product_name,
            'product_description' => $product_description,
            'price' => $price,
            'product_code' => $product_code,
            'category_id' => $category_id,
            'updated_at' => new DateTime()
        ];

        // insert to database
        $result = $this->productsDataAccess->update($id, $data);

        if ($result > 0) { // insert success then return ID
            // redirect with message
            return Redirect::to('/backend/products')
                ->with("messageSuccess", "Successfully")
                ->with("messageDetail", 'Create Successfully');
        } else { // insert fail
            return Redirect::to("/backend/products/add")
                ->withInput()
                ->with("messageFail", "Failed")
                ->with("messageDetail", 'Create Failed');
        }
    }
}
