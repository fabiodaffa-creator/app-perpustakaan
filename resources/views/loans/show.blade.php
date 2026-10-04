@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
    <div style="max-width: 600px;">
        <h1>Detail Peminjaman</h1>
        <p><a href="{{ route('loans.index') }}">&larr; Kembali ke daftar peminjaman</a></p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <th style="width: 30%; background-color: #f2f2f2;">Anggota</th>
                <td>{{ $loan['member']['nama'] }} ({{ $loan['member']['nim'] }})</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Petugas</th>
                <td>{{ $loan['user']['name'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Tanggal Pinjam</th>
                <td>{{ $loan['tanggal_pinjam'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Tanggal Kembali</th>
                <td>{{ $loan['tanggal_kembali'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Tanggal Dikembalikan</th>
                <td>{{ $loan['tanggal_dikembalikan'] ?? '-' }}</td>
            </tr>
            <tr>
                <th style="background-color: #f2f2f2;">Status</th>
                <td><span class="badge badge-{{ $loan['status'] }}">{{ ucfirst($loan['status']) }}</span></td>
            </tr>
        </table>

        <h2 style="margin-top: 30px;">Buku yang Dipinjam</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr>
                    <th style="background-color: #f2f2f2;">Judul</th>
                    <th style="background-color: #f2f2f2;">Penulis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loan['loanItems'] as $item)
                    <tr>
                        <td>{{ $item['book']['judul'] }}</td>
                        <td>{{ $item['book']['penulis'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection