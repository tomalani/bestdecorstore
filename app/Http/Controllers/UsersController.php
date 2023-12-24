<?php

namespace App\Http\Controllers;

use App\Http\DataAccess\UsersDataAccess;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $usersDataAccess;

    public function __construct(
        UsersDataAccess $usersDataAccess
    ) {
        // Data accessor
        $this->usersDataAccess = $usersDataAccess;
    }
    public function index()
    {
        $users = $this->usersDataAccess->getAll();

        return view('backend.users.index')->with('users', $users);
    }
}
