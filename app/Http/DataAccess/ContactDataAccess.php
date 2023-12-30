<?php

namespace App\Http\DataAccess;

use App\Models\Categories;
use App\Models\ContactModel;
use Exception;

class ContactDataAccess
{
    public function getAll()
    {
        try {
            return ContactModel::get();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function getById($id)
    {
        try {
            return ContactModel::where('id', '=', $id)->first();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    public function getDeleteById($id)
    {
        try {
            return ContactModel::where('id', '=', $id)->delete();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
