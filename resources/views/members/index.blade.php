<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>
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
        .search-box { margin-bottom: 20px; }
        .search-box input { padding: 8px; width: 250px; }
        .search-box button { padding: 8px 12px; }
    </style>
</head>
<body>
    <h1>Daftar Anggota</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="search-box">
        <form action="{{ route('members.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari nama anggota..." value="{{ request('search') }}">
            <button type="submit">Cari</button>
            <a href="{{ route('members.index') }}" style="margin-left: 10px; text-decoration: none;">Reset</a>
        </form>
    </div>

    <p><a href="{{ route('members.create') }}" class="btn">Tambah Anggota Baru</a></p>

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
                <tr>
                    <td>{{ $member['nim'] }}</td>
                    <td>{{ $member['nama'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ ucfirst($member['status']) }}</td>
                    <td>
                        <a href="{{ route('members.show', $member['id']) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('members.edit', $member['id']) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('members.destroy', $member['id']) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Data anggota tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $members->appends(request()->query())->links() }}
    </div>
</body>
</html>