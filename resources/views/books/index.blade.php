@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Daftar Buku</h1>
    <p><a href="{{ route('books.create') }}" class="btn">+ Tambah Buku</a></p>

    <table>
        <!-- Isikan blok thead dan tbody persis seperti kode Anda di atas -->
    </table>
@endsection