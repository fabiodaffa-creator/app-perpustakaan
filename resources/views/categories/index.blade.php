<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 6px 12px; background: #2563eb; color: #fff; text-decoration: none; border-radius: 4px; display: inline-block; }
        .btn-edit { background: #eab308; }
        .btn-danger { background: #dc2626; border: none; cursor: pointer; color: white; padding: 6px 12px; border-radius: 4px;}
        .alert { padding: 10px; background-color: #dcfce3; color: #166534; border: 1px solid #bbf7d0; border-radius: 4px; margin-bottom: 20px; }
        .mt-4 { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Daftar Kategori</h1>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <p><a href="{{ route('categories.create') }}" class="btn">Tambah Kategori Baru</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['nama_kategori'] }}</td>
                    <td>{{ $category['deskripsi'] }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category['id']) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('categories.destroy', $category['id']) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Belum ada data kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{-- Baris untuk memunculkan navigasi pagination --}}
        {{ $categories->links() }}
    </div>
</body>
</html>