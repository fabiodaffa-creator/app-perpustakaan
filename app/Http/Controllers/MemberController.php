<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest; 
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        // Data dummy menggunakan array of objects
        $members = [
            (object)[
                'nama' => 'Andi Susanto', 
                'nim' => '12345678', 
                'email' => 'andi@email.com', 
                'nomor_telepon' => '081234567890', 
                'alamat' => 'Jl. Merdeka No. 1', 
                'status' => 'aktif'
            ],
            (object)[
                'nama' => 'Siti Aminah', 
                'nim' => '87654321', 
                'email' => 'siti@email.com', 
                'nomor_telepon' => '089876543210', 
                'alamat' => 'Jl. Sudirman No. 2', 
                'status' => 'nonaktif'
            ]
        ];

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validatedData = $request->validated();
        return redirect()->route('members.index')
                         ->with('success', 'Anggota berhasil ditambahkan!');
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