# NOTES

Tuliskan catatan-catatan apapun di sini. Entah itu informasi mengenai penggunaan sebuah fitur khusus, _best practice_, pantangan-pantangan dan lain-lain.
Tuliskan catatan apapun.

## Migrasi: PIK-R

Untuk field `jabatan` dan `jabatan_lainnya` tidak berada di dalam tabel PIK-R melainkan merupakan field di tabel `Pembina`.

## Seeder: Kecamatan

Saya sudah menambahkan beberapa seeder sebagai kebutuhan testing.

## Seeder: Desa

Saya sudah menambahkan beberapa seeder untuk desa. Note untuk beberapa desa masih menggunakan `id kecamatan` yang sementara ada, jika ada penambahan data maka `id kecamatan` ini juga harus disesuaikan.

## Controllers: Semua

Tidak perlu menambahkan `Controller` baru untuk setiap action. Buat saja satu `Controller` untuk menghandle satu `Model` selagi bisa.
