@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <div style="max-width: 500px;">
        <h1>Edit Buku</h1>
        <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

        <form action="{{ route('books.update', $book['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="judul" style="display: block; margin-top: 12px; font-weight: bold;">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $book['judul']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('judul')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <label for="penulis" style="display: block; margin-top: 12px; font-weight: bold;">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $book['penulis']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('penulis')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <label for="penerbit" style="display: block; margin-top: 12px; font-weight: bold;">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit', $book['penerbit']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('penerbit')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <label for="tahun_terbit" style="display: block; margin-top: 12px; font-weight: bold;">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit', $book['tahun_terbit']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('tahun_terbit')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <label for="isbn" style="display: block; margin-top: 12px; font-weight: bold;">ISBN (opsional)</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book['isbn']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('isbn')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <label for="stok" style="display: block; margin-top: 12px; font-weight: bold;">Stok</label>
            <input type="number" name="stok" id="stok" value="{{ old('stok', $book['stok']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('stok')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <label for="category_id" style="display: block; margin-top: 12px; font-weight: bold;">Kategori</label>
            <select name="category_id" id="category_id" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" @selected(old('category_id', $book['category_id']) == $category['id'])>
                        {{ $category['nama_kategori'] }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn" style="margin-top: 20px;">Perbarui</button>
        </form>
    </div>
@endsection