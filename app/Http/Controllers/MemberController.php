<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index() 
    {
        return 'MemberController@index';  // This method will handle the request to list all members
    }

    public function create()
    {
        return 'MemberController@create'; // This method will handle the request to show the form for creating a new member
    }

    public function store(Request $request)
    {
        return 'MemberController@store'; // This method will handle the request to store a new member in the database
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}"; // This method will handle the request to show the form for editing a specific member by its ID
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}"; // This method will handle the request to update a specific member by its ID in the database
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}"; // This method will handle the request to delete a specific member by its ID from the database
    }
}