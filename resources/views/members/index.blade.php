@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    <div class="search-box" style="margin-bottom: 20px;">
        <form action="{{ route('members.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari nama anggota..." value="{{ request('search') }}" style="padding: 8px; width: 250px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" style="padding: 8px 12px; background: #e5e7eb; border: 1px solid #ccc; border-radius: 4px; cursor: pointer;">Cari</button>
            <a href="{{ route('members.index') }}" style="margin-left: 10px; text-decoration: none; color: #4f46e5;">Reset</a>
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
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('members.show', $member['id']) }}" class="btn" style="background: #0ea5e9;">Detail</a>
                            <a href="{{ route('members.edit', $member['id']) }}" class="btn" style="background: #eab308;">Edit</a>
                            <form action="{{ route('members.destroy', $member['id']) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background: #dc2626;" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                            </form>
                        </div>
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
@endsection