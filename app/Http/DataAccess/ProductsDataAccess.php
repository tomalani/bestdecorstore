<?php

namespace App\Http\DataAccess;

use App\Models\Products;

use Exception;

class ProductsDataAccess
{
    public function getAll()
    {
        return Products::leftJoin('categories', 'categories.id', '=', 'products.category_id')->get();
    }
    public function isExistName($name)
    {
        return Products::where('product_name', '=', $name)->count();
    }
    public function insert($data)
    {
        return Products::insertGetId($data);
    }
    public function getById($id)
    {
        return Products::where('id', '=', $id)->first();
    }
    public function update($id, $data)
    {
        return Products::where('id', '=', $id)->update($data);
    }
    public function delete($id)
    {
        return Products::where('id', '=', $id)->delete();
    }
}
