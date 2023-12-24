<?php

namespace App\Http\DataAccess;

use App\Models\Categories;

use Exception;

class CategoriesDataAccess
{
    public function getAll()
    {
        try {
            return Categories::get();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function isExistName($name)
    {

        try {
            return Categories::where('category_name', '=', $name)->count();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function insert($data)
    {
        try {
            return Categories::insertGetId($data);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function getById($id)
    {
        try {
            return Categories::where('id', '=', $id)->first();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function delete($id)
    {
        try {
            return Categories::where('id', '=', $id)->delete();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function update($id, $data)
    {
        try {
            return Categories::where('id', $id)
                ->update($data);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
