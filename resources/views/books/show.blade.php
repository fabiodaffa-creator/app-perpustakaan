@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <div style="max-width: 600px;">
        <h1>Detail Buku</h1>
        <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <th style="width: 30%; background-color: #f2f2f2;">ID</th>
                <td>{{ $book['id'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Judul</th>
                <td>{{ $book['judul'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Penulis</th>
                <td>{{ $book['penulis'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Penerbit</th>
                <td>{{ $book['penerbit'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Tahun Terbit</th>
                <td>{{ $book['tahun_terbit'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">ISBN</th>
                <td>{{ $book['isbn'] ?: '-' }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Stok</th>
                <td>{{ $book['stok'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">ID Kategori</th>
                <td>{{ $book['category_id'] }}</td>
            </tr>
        </table>
    </div>
@endsection