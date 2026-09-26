@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <div style="max-width: 500px;">
        <h1>Edit Kategori</h1>
        <p><a href="{{ route('categories.index') }}">&larr; Kembali ke daftar kategori</a></p>

        <form action="{{ route('categories.update', $category['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nama_kategori" style="display: block; margin-top: 12px; font-weight: bold;">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori', $category['nama_kategori']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('nama_kategori')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <label for="deskripsi" style="display: block; margin-top: 12px; font-weight: bold;">Deskripsi (opsional)</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">{{ old('deskripsi', $category['deskripsi']) }}</textarea>
            @error('deskripsi')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn" style="margin-top: 20px;">Perbarui</button>
        </form>
    </div>
@endsection