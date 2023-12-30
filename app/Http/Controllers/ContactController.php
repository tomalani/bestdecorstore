<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\DataAccess\ContactDataAccess;

class ContactController extends Controller
{
    private $contactDataAccess;

    public function __construct(
        ContactDataAccess $contactAccess,
    ) {
        // Data accessor
        $this->contactDataAccess = $contactAccess;
    }

    public function index()
    {
        $contacts = $this->contactDataAccess->getAll();

        return view('backend.contact.index')->with('contacts', $contacts);
    }
    public function edit($id)
    {
        $contact = $this->contactDataAccess->getById($id);

        return view('backend.contact.view')->with('contact', $contact);
    }
    public function delete(Request $request)
    {
        $contactId = $request->input('contact_id');
        $d = $this->contactDataAccess->getDeleteById($contactId);

        return redirect()->route('contact-index');
    }
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
