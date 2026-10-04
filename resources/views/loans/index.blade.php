@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
    <h1>Daftar Peminjaman</h1>

    <p><a href="{{ route('loans.create') }}" class="btn">Tambah Peminjaman</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loan['id'] }}</td>
                    <td>{{ $loan['member']['nama'] }}</td>
                    <td>{{ $loan['user']['name'] }}</td>
                    <td>
                        @foreach ($loan['loanItems'] as $item)
                            {{ $item['book']['judul'] }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>{{ $loan['tanggal_pinjam'] }}</td>
                    <td>{{ $loan['tanggal_kembali'] }}</td>
                    <td><span class="badge badge-{{ $loan['status'] }}">{{ ucfirst($loan['status']) }}</span></td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('loans.show', $loan['id']) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('loans.edit', $loan['id']) }}" class="btn btn-edit">Edit</a>
                            @if ($loan['status'] === 'dipinjam')
                                <form action="{{ route('loans.kembalikan', $loan['id']) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn" style="background: #16a34a;">Kembalikan</button>
                                </form>
                            @endif
                            <form action="{{ route('loans.destroy', $loan['id']) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Hapus transaksi ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center;">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $loans->links() }}
    </div>
@endsection