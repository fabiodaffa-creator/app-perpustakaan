<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() 
    {
        return 'CategoryController@index';  // This method will handle the request to list all categories
    }

    public function create()
    {
        return 'CategoryController@create'; // This method will handle the request to show the form for creating a new category
    }

    public function store(Request $request)
    {
        return 'CategoryController@store'; // This method will handle the request to store a new category in the database
    }

    public function edit(string $id)
    {
        return "CategoryController@edit, id: {$id}"; // This method will handle the request to show the form for editing a specific category by its ID
    }

    public function update(Request $request, string $id)
    {
        return "CategoryController@update, id: {$id}"; // This method will handle the request to update a specific category by its ID in the database
    }

    public function destroy(string $id)
    {
        return "CategoryController@destroy, id: {$id}"; // This method will handle the request to delete a specific category by its ID from the database
    }
}