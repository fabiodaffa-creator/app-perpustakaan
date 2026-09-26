@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
    <div style="max-width: 600px;">
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
    </div>
@endsection