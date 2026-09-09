<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private array $categories = [
        ['id' => 1, 'nama_kategori' => 'Fiksi', 'deskripsi' => 'Buku cerita rekaan seperti novel dan kumpulan cerpen.'],
        ['id' => 2, 'nama_kategori' => 'Teknologi', 'deskripsi' => 'Buku seputar teknologi, pemrograman, dan ilmu komputer.'],
        ['id' => 3, 'nama_kategori' => 'Sejarah', 'deskripsi' => 'Buku bertema sejarah dan biografi tokoh.'],
    ];
    
    public function index()
    {
        $categories = $this->categories;

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('categories.index')
            ->with('success', "Kategori \"{$validated['nama_kategori']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
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