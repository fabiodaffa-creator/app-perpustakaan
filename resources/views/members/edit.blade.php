@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <div style="max-width: 500px;">
        <h1>Edit Anggota</h1>
        <p><a href="{{ route('members.index') }}">&larr; Kembali</a></p>

        <form action="{{ route('members.update', $member['id']) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label style="display: block; margin-top: 12px; font-weight: bold;">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $member['nama']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('nama') <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div> @enderror

            <label style="display: block; margin-top: 12px; font-weight: bold;">NIM</label>
            <input type="text" name="nim" value="{{ old('nim', $member['nim']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('nim') <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div> @enderror

            <label style="display: block; margin-top: 12px; font-weight: bold;">Email</label>
            <input type="email" name="email" value="{{ old('email', $member['email']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('email') <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div> @enderror

            <label style="display: block; margin-top: 12px; font-weight: bold;">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $member['nomor_telepon']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            @error('nomor_telepon') <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div> @enderror

            <label style="display: block; margin-top: 12px; font-weight: bold;">Alamat</label>
            <textarea name="alamat" rows="3" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">{{ old('alamat', $member['alamat']) }}</textarea>
            @error('alamat') <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div> @enderror

            <label style="display: block; margin-top: 12px; font-weight: bold;">Status</label>
            <select name="status" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
                <option value="aktif" {{ old('status', $member['status']) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $member['status']) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            @error('status') <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div> @enderror

            <button type="submit" class="btn" style="margin-top: 20px;">Perbarui</button>
        </form>
    </div>
@endsection