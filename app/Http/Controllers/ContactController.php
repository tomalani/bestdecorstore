<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use View;

class ContactController extends Controller
{
    public function contact()
    {
        return View::make("contact");
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $validatedData['created_at'] = \Carbon\Carbon::now();

        $result = ContactModel::insert($validatedData);

        return View::make("contact-success");
    }
}
