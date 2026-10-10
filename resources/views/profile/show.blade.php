@extends('layouts.app')

@section('content')
    <div style="max-width: 500px;">
        <h1>Profil Saya</h1>

        @if (session('success'))
            <div style="background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px;">
                {{ session('success') }}
            </div>
        @endif

        <table style="margin-bottom: 32px;">
            <tr>
                <th style="text-align: left; padding: 4px 16px 4px 0;">Nama</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th style="text-align: left; padding: 4px 16px 4px 0;">Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th style="text-align: left; padding: 4px 16px 4px 0;">Role</th>
                <td>{{ ucfirst($user->role) }}</td>
            </tr>
        </table>

        <h2>Ganti Password</h2>

        <form action="{{ route('profile.password') }}" method="POST">
            @csrf
            @method('PUT')

            <label for="current_password" style="display: block; margin-top: 12px; font-weight: bold;">Password Lama</label>
            <input type="password" name="current_password" id="current_password" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('current_password')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <label for="password" style="display: block; margin-top: 12px; font-weight: bold;">Password Baru</label>
            <input type="password" name="password" id="password" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('password')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror

            <label for="password_confirmation" style="display: block; margin-top: 12px; font-weight: bold;">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">

            <button type="submit" style="margin-top: 20px; padding: 10px 18px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                Simpan Password
            </button>
        </form>
    </div>
@endsection