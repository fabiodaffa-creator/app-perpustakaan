<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() 
    {
        return 'BookController@index';  // This method will handle the request to list all books
    }

    public function create()
    {
        return 'BookController@create'; // This method will handle the request to show the form for creating a new book
    }

    public function store(Request $request)
    {
        return 'BookController@store'; // This method will handle the request to store a new book in the database
    }

    public function show(string $id)
    {
        return "BookController@show, id: {$id}"; // This method will handle the request to show a specific book by its ID
    }

    public function edit(string $id)
    {
        return "BookController@edit, id: {$id}"; // This method will handle the request to show the form for editing a specific book by its ID
    }

    public function update(Request $request, string $id)
    {
        return "BookController@update, id: {$id}"; // This method will handle the request to update a specific book by its ID in the database
    }

    public function destroy(string $id)
    {
        return "BookController@destroy, id: {$id}"; // This method will handle the request to delete a specific book by its ID from the database
    }
}