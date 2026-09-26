<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Buku</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; width: 30%; }
    </style>
</head>
<body>
    <h1>Detail Buku</h1>
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <table>
        <tr>
            <th>ID</th>
            <td>{{ $book['id'] }}</td>
        </tr>
        <tr>
            <th>Judul</th>
            <td>{{ $book['judul'] }}</td>
        </tr>
        <tr>
            <th>Penulis</th>
            <td>{{ $book['penulis'] }}</td>
        </tr>
        <tr>
            <th>Penerbit</th>
            <td>{{ $book['penerbit'] }}</td>
        </tr>
        <tr>
            <th>Tahun Terbit</th>
            <td>{{ $book['tahun_terbit'] }}</td>
        </tr>
        <tr>
            <th>ISBN</th>
            <td>{{ $book['isbn'] ?: '-' }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $book['stok'] }}</td>
        </tr>
        <tr>
            <th>ID Kategori</th>
            <td>{{ $book['category_id'] }}</td>
        </tr>
    </table>
</body>
</html>