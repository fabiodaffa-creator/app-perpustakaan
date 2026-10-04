@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
    <div style="max-width: 700px;">
        <h1>Detail Anggota</h1>
        <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr><th style="width: 30%; background-color: #f2f2f2;">ID</th><td>{{ $member['id'] }}</td></tr>
            <tr><th style="background-color: #f2f2f2;">NIM</th><td>{{ $member['nim'] }}</td></tr>
            <tr><th style="background-color: #f2f2f2;">Nama</th><td>{{ $member['nama'] }}</td></tr>
            <tr><th style="background-color: #f2f2f2;">Email</th><td>{{ $member['email'] }}</td></tr>
            <tr><th style="background-color: #f2f2f2;">Nomor Telepon</th><td>{{ $member['nomor_telepon'] }}</td></tr>
            <tr><th style="background-color: #f2f2f2;">Alamat</th><td>{{ $member['alamat'] }}</td></tr>
            <tr><th style="background-color: #f2f2f2;">Status</th><td>{{ ucfirst($member['status']) }}</td></tr>
        </table>

        <h2 style="margin-top: 30px;">Riwayat Peminjaman</h2>
        <p><em>Diambil lewat relasi <code>$member->loans</code> - satu anggota bisa punya banyak transaksi peminjaman.</em></p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr>
                    <th style="background-color: #f2f2f2;">Tanggal Pinjam</th>
                    <th style="background-color: #f2f2f2;">Tanggal Kembali</th>
                    <th style="background-color: #f2f2f2;">Petugas</th>
                    <th style="background-color: #f2f2f2;">Buku</th>
                    <th style="background-color: #f2f2f2;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($member['loans'] as $loan)
                    <tr>
                        <td>{{ $loan['tanggal_pinjam'] }}</td>
                        <td>{{ $loan['tanggal_kembali'] }}</td>
                        <td>{{ $loan['user']['name'] }}</td>
                        <td>
                            @foreach ($loan['loanItems'] as $item)
                                {{ $item['book']['judul'] }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>{{ ucfirst($loan['status']) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">Anggota ini belum pernah meminjam buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection