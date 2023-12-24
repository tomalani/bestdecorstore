<?php

namespace App\Http\Controllers;

use App\Http\DataAccess\CategoriesDataAccess;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DateTime;

class CategoriesController extends Controller
{
    private $categoriesDataAccess;

    public function __construct(
        CategoriesDataAccess $categoriesAccess,
    ) {
        // Data accessor
        $this->categoriesDataAccess = $categoriesAccess;
    }

    public function index()
    {
        $categories = $this->categoriesDataAccess->getAll();

        return view('backend.categories.index')->with('categories', $categories);
    }
    public function add()
    {
        return view('backend.categories.add');
    }
    public function insert(Request $request)
    {
        // keep data en
        $category_name = $request->input('category_name');
        $category_description = $request->input('category_description');

        // check existing
        $e = $this->categoriesDataAccess->isExistName($category_name);
        if ($e > 0) {
            return Redirect::to("/backend/categories/add")
                ->withInput()
                ->with("messageFail", "Fail")
                ->with("messageDetail", 'Name already exist');
        }

        // prepared data
        $data = [
            'category_name' => $category_name,
            'category_description' => $category_description,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];

        // insert to database
        $result = $this->categoriesDataAccess->insert($data);

        if ($result > 0) { // insert success then return ID
            // redirect with message
            return Redirect::to("/backend/categories")
                ->with("messageSuccess", "Success")
                ->with("messageDetail", 'Create Categort Successfully');
        } else { // insert fail
            return Redirect::to("/backend/categorie/add")
                ->withInput()
                ->with("messageFail", "Fail")
                ->with("messageDetail", 'Create Categort Failed');
        }
    }
    public function edit($id)
    {
        $category = $this->categoriesDataAccess->getById($id);

        return view('backend.categories.edit')->with('category', $category);
    }
    public function delete($id)
    {
        $category = $this->categoriesDataAccess->delete($id);

        if ($category) {
            return Redirect::to("/backend/categories")
                ->with("messageSuccess", "Success")
                ->with("messageDetail", 'Updated Successfully');
        } else {
            return Redirect::to("/backend/categorie")
                ->withInput()
                ->with("messageFail", "Fail")
                ->with("messageDetail", 'Updated Failed');
        }
    }
    public function update(Request $request)
    {
        // keep data en
        $id = $request->input('id');
        $category_name = $request->input('category_name');
        $category_description = $request->input('category_description');

        // prepared data
        $data = [
            'category_name' => $category_name,
            'category_description' => $category_description,
            'updated_at' => new DateTime()
        ];

        $category = $this->categoriesDataAccess->update($id, $data);

        if ($category) {
            return Redirect::to("/backend/categories")
                ->with("messageSuccess", "Success")
                ->with("messageDetail", 'Updated Successfully');
        } else {
            return Redirect::to("/backend/categorie/edit")
                ->withInput()
                ->with("messageFail", "Fail")
                ->with("messageDetail", 'Updated Failed');
        }
    }
}
