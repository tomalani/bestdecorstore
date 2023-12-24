<?php

namespace App\Http\DataAccess;

use App\Models\Users;

use Exception;

class UsersDataAccess
{
    public function getAll()
    {
        try {
            return Users::get();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
