<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index() 
    {
        return 'LoanController@index';  // This method will handle the request to list all loans
    }

    public function create()
    {
        return 'LoanController@create'; // This method will handle the request to show the form for creating a new loan
    }

    public function store(Request $request)
    {
        return 'LoanController@store'; // This method will handle the request to store a new loan in the database
    }

    public function edit(string $id)
    {
        return "LoanController@edit, id: {$id}"; // This method will handle the request to show the form for editing a specific loan by its ID
    }

    public function update(Request $request, string $id)
    {
        return "LoanController@update, id: {$id}"; // This method will handle the request to update a specific loan by its ID in the database
    }

    public function destroy(string $id)
    {
        return "LoanController@destroy, id: {$id}"; // This method will handle the request to delete a specific loan by its ID from the database
    }

    public function kembalikan(string $id)
    {
    return "LoanController@kembalikan, id: {$id}"; // This method will handle the request to mark a specific loan as returned by its ID
    }
}