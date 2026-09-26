@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <h1>Daftar Kategori</h1>

    <p><a href="{{ route('categories.create') }}" class="btn">Tambah Kategori Baru</a></p>

    <table>
        <thead>
            <tr>
                <th style="background-color: #f2f2f2;">ID</th>
                <th style="background-color: #f2f2f2;">Nama Kategori</th>
                <th style="background-color: #f2f2f2;">Deskripsi</th>
                <th style="background-color: #f2f2f2;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['nama_kategori'] }}</td>
                    <td>{{ $category['deskripsi'] }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('categories.edit', $category['id']) }}" class="btn" style="background: #eab308;">Edit</a>
                            <form action="{{ route('categories.destroy', $category['id']) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background: #dc2626;" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Belum ada data kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4" style="margin-top: 20px;">
        {{-- Baris untuk memunculkan navigasi pagination --}}
        {{ $categories->links() }}
    </div>
@endsection