<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 6px 12px; background: #2563eb; color: #fff; text-decoration: none; border-radius: 4px; display: inline-block; }
        .btn-info { background: #0ea5e9; }
        .btn-edit { background: #eab308; }
        .btn-danger { background: #dc2626; border: none; cursor: pointer; color: white; padding: 6px 12px; border-radius: 4px;}
        .alert { padding: 10px; background-color: #dcfce3; color: #166534; border: 1px solid #bbf7d0; border-radius: 4px; margin-bottom: 20px; }
        .mt-4 { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

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
                        <a href="{{ route('books.show', $book['id']) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('books.edit', $book['id']) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('books.destroy', $book['id']) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
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
</body>
</html>