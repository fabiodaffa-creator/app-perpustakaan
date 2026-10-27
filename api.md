# Dokumentasi REST API - Perpustakaan Digital Kampus

Base URL: `http://127.0.0.1:8000/api`  
Header wajib: `Accept: application/json`  
Catatan: seluruh endpoint bersifat publik (tanpa autentikasi) pada pertemuan ini.

## Ringkasan Endpoint

| Method | URL | Body | Status Sukses | Status Gagal |
|---|---|---|---|---|
| GET | `/api/books` | - | 200 OK | - |
| GET | `/api/books/{id}` | - | 200 OK | 404 Not Found |
| POST | `/api/books` | JSON buku | 201 Created | 422 Unprocessable Content |
| PUT | `/api/books/{id}` | JSON buku | 200 OK | 404 Not Found, 422 Unprocessable Content |
| DELETE | `/api/books/{id}` | - | 200 OK | 404 Not Found |
| GET | `/api/members` | - | 200 OK | - |
| GET | `/api/members/{id}` | - | 200 OK | 404 Not Found |
| GET | `/api/loans` | - | 200 OK | - |
| POST | `/api/loans` | JSON peminjaman | 201 Created | 422 Unprocessable Content |
| PUT | `/api/loans/{id}/kembalikan` | - | 200 OK | 404 Not Found |
| GET | `/api/stats` | - | 200 OK | - |

---

## Books

### GET /api/books
Query opsional: `?judul=` (pencarian sebagian), `?category_id=`, `?page=`.

Response 200 OK:
```json
{
    "data": [
        {
            "id": 1,
            "judul": "senja",
            "penulis": "fabio daffa",
            "penerbit": "gramedia",
            "tahun_terbit": "2026",
            "isbn": null,
            "stok": 1,
            "sampul": null,
            "category": {
                "id": 3,
                "nama_kategori": "sejarah"
            },
            "created_at": "2026-10-10T04:25:10.000000Z",
            "updated_at": "2026-10-10T04:25:10.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/books?page=1",
        "last": "http://127.0.0.1:8000/api/books?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/books?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "page": null,
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/books",
        "per_page": 10,
        "to": 1,
        "total": 1
    }
}
```

### GET /api/books/{id}
Response 200 OK:
```json
{
    "data": {
        "id": 1,
        "judul": "senja",
        "penulis": "fabio daffa",
        "penerbit": "gramedia",
        "tahun_terbit": "2026",
        "isbn": null,
        "stok": 1,
        "sampul": null,
        "category": {
            "id": 3,
            "nama_kategori": "sejarah"
        },
        "created_at": "2026-10-10T04:25:10.000000Z",
        "updated_at": "2026-10-10T04:25:10.000000Z"
    }
}
```

Response 404 Not Found (ID tidak ditemukan):
```json
{
    "message": "No query results for model [App\\Models\\Book] 999"
}
```

### POST /api/books
Body (JSON):
```json
{
    "judul": "Laskar Pelangi",
    "penulis": "Andrea Hirata",
    "penerbit": "Bentang Pustaka",
    "tahun_terbit": 2005,
    "isbn": "9789793062792",
    "stok": 5,
    "category_id": 1
}
```

Response 201 Created:
```json
{
    "data": {
        "id": 2,
        "judul": "Laskar Pelangi",
        "penulis": "Andrea Hirata",
        "penerbit": "Bentang Pustaka",
        "tahun_terbit": 2005,
        "isbn": "9789793062792",
        "stok": 5,
        "sampul": null,
        "category": {
            "id": 1,
            "nama_kategori": "informatika"
        },
        "created_at": "2026-10-27T16:35:59.000000Z",
        "updated_at": "2026-10-27T16:35:59.000000Z"
    }
}
```

Response 422 Unprocessable Content (Body kosong / validasi gagal):
```json
{
    "message": "The judul field is required. (and 5 more errors)",
    "errors": {
        "judul": [
            "The judul field is required."
        ],
        "penulis": [
            "The penulis field is required."
        ],
        "penerbit": [
            "The penerbit field is required."
        ],
        "tahun_terbit": [
            "The tahun terbit field is required."
        ],
        "stok": [
            "The stok field is required."
        ],
        "category_id": [
            "The category id field is required."
        ]
    }
}
```

### PUT /api/books/{id}
Body (JSON):
```json
{
    "judul": "Laskar Pelangi (Edisi Baru)",
    "penulis": "Andrea Hirata",
    "penerbit": "Bentang Pustaka",
    "tahun_terbit": 2005,
    "isbn": "9789793062792",
    "stok": 8,
    "category_id": 1
}
```

Response 200 OK:
```json
{
    "data": {
        "id": 2,
        "judul": "Laskar Pelangi (Edisi Baru)",
        "penulis": "Andrea Hirata",
        "penerbit": "Bentang Pustaka",
        "tahun_terbit": 2005,
        "isbn": "9789793062792",
        "stok": 8,
        "sampul": null,
        "category": {
            "id": 1,
            "nama_kategori": "informatika"
        },
        "created_at": "2026-10-27T16:35:59.000000Z",
        "updated_at": "2026-10-27T16:35:59.000000Z"
    }
}
```

Response 404 Not Found:
```json
{
    "message": "No query results for model [App\\Models\\Book] 999"
}
```

Response 422 Unprocessable Content (Validasi gagal):
```json
{
    "message": "The judul field is required. (and 5 more errors)",
    "errors": {
        "judul": [
            "The judul field is required."
        ],
        "penulis": [
            "The penulis field is required."
        ],
        "penerbit": [
            "The penerbit field is required."
        ],
        "tahun_terbit": [
            "The tahun terbit field is required."
        ],
        "stok": [
            "The stok field is required."
        ],
        "category_id": [
            "The category id field is required."
        ]
    }
}
```

### DELETE /api/books/{id}
Response 200 OK:
```json
{
    "message": "Buku berhasil dihapus."
}
```

Response 404 Not Found:
```json
{
    "message": "No query results for model [App\\Models\\Book] 999"
}
```

---

## Members

### GET /api/members
Response 200 OK:
```json
{
    "data": [
        {
            "id": 1,
            "nama": "Fabio Daffa Airlangga Daniswara",
            "nim": "3125500036",
            "email": "fabiodaffa65@gmail.com",
            "nomor_telepon": "085643820891",
            "alamat": "Jalan Gebang Kidul No 69 A Depan Pondok Pesantren Muhyiddin, Gebang Putih, Kec. Sukolilo, Surabaya, Jawa Timur 60117",
            "status": "aktif",
            "created_at": "2026-10-10T04:24:55.000000Z",
            "updated_at": "2026-10-10T04:24:55.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/members?page=1",
        "last": "http://127.0.0.1:8000/api/members?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/members?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "page": null,
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/members",
        "per_page": 10,
        "to": 1,
        "total": 1
    }
}
```

### GET /api/members/{id}
Response 200 OK:
```json
{
    "data": {
        "id": 1,
        "nama": "Fabio Daffa Airlangga Daniswara",
        "nim": "3125500036",
        "email": "fabiodaffa65@gmail.com",
        "nomor_telepon": "085643820891",
        "alamat": "Jalan Gebang Kidul No 69 A Depan Pondok Pesantren Muhyiddin, Gebang Putih, Kec. Sukolilo, Surabaya, Jawa Timur 60117",
        "status": "aktif",
        "created_at": "2026-10-10T04:24:55.000000Z",
        "updated_at": "2026-10-10T04:24:55.000000Z"
    }
}
```

Response 404 Not Found:
```json
{
    "message": "No query results for model [App\\Models\\Member] 999"
}
```

---

## Loans

### GET /api/loans
Response 200 OK:
```json
{
    "data": [
        {
            "id": 1,
            "member": {
                "id": 1,
                "nama": "Fabio Daffa Airlangga Daniswara"
            },
            "petugas": {
                "id": 2,
                "name": "Petugas Satu"
            },
            "tanggal_pinjam": "2026-10-10",
            "tanggal_kembali": "2026-10-17",
            "tanggal_dikembalikan": null,
            "status": "dipinjam",
            "books": [
                {
                    "id": 1,
                    "judul": "senja"
                }
            ]
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/loans?page=1",
        "last": "http://127.0.0.1:8000/api/loans?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/loans?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "page": null,
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/loans",
        "per_page": 10,
        "to": 1,
        "total": 1
    }
}
```

### POST /api/loans
Body (JSON):
```json
{
    "member_id": 1,
    "user_id": 1,
    "tanggal_pinjam": "2026-10-27",
    "tanggal_kembali": "2026-11-03",
    "book_ids": [1]
}
```

Response 201 Created (status = "dipinjam"):
```json
{
    "data": {
        "id": 2,
        "member": {
            "id": 1,
            "nama": "Fabio Daffa Airlangga Daniswara"
        },
        "petugas": {
            "id": 1,
            "name": "Admin Perpustakaan"
        },
        "tanggal_pinjam": "2026-10-27",
        "tanggal_kembali": "2026-11-03",
        "tanggal_dikembalikan": null,
        "status": "dipinjam",
        "books": [
            {
                "id": 1,
                "judul": "senja"
            }
        ]
    }
}
```

Response 422 Unprocessable Content (Body kosong / validasi gagal):
```json
{
    "message": "Anggota wajib dipilih. (and 4 more errors)",
    "errors": {
        "member_id": [
            "Anggota wajib dipilih."
        ],
        "user_id": [
            "Petugas (user_id) wajib diisi."
        ],
        "tanggal_pinjam": [
            "Tanggal pinjam wajib diisi."
        ],
        "tanggal_kembali": [
            "Tanggal kembali wajib diisi."
        ],
        "book_ids": [
            "Pilih minimal satu buku."
        ]
    }
}
```

### PUT /api/loans/{id}/kembalikan
Response 200 OK (status = "dikembalikan"):
```json
{
    "data": {
        "id": 2,
        "member": {
            "id": 1,
            "nama": "Fabio Daffa Airlangga Daniswara"
        },
        "petugas": {
            "id": 1,
            "name": "Admin Perpustakaan"
        },
        "tanggal_pinjam": "2026-10-27",
        "tanggal_kembali": "2026-11-03",
        "tanggal_dikembalikan": "2026-10-27",
        "status": "dikembalikan",
        "books": [
            {
                "id": 1,
                "judul": "senja"
            }
        ]
    }
}
```

Response 404 Not Found:
```json
{
    "message": "No query results for model [App\\Models\\Loan] 999"
}
```

---

## Stats

### GET /api/stats
Response 200 OK:
```json
{
    "total_buku": 1,
    "total_anggota": 1,
    "peminjaman_aktif": 1
}
```