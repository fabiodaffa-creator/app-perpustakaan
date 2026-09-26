@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Daftar Buku</h1>

    <p><a href="{{ route('books.create') }}" class="btn">Tambah Buku Baru</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>ID Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book['id'] }}</td>
                    <td>{{ $book['judul'] }}</td>
                    <td>{{ $book['penulis'] }}</td>
                    <td>{{ $book['category_id'] }}</td>
                    <td>{{ $book['stok'] }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('books.show', $book['id']) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('books.edit', $book['id']) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('books.destroy', $book['id']) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $books->links() }}
    </div>

    <p><em>Catatan: kolom kategori masih menampilkan ID. Menampilkan nama kategori memerlukan Eloquent Relationship, dipelajari di Pertemuan 7.</em></p>
@endsection