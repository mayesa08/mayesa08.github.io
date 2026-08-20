# Sistem Parkir — Setup Database

Instruksi singkat untuk menyiapkan database MySQL agar aplikasi berjalan.

1. Import SQL

- Dengan phpMyAdmin: buka phpMyAdmin → Import → pilih `database.sql` → Jalankan.
- Dengan command-line MySQL:

```bash
mysql -u root -p < database.sql
```

2. Cek koneksi

File koneksi ada di `koneksi.php`. Default pengaturan (XAMPP):

- host: `localhost`
- username: `root`
- password: `` (kosong)
- database: `parkir`

Jika menggunakan kredensial berbeda, ubah nilai pada `koneksi.php`.

3. Pastikan file index sudah diakses sebagai PHP

Server Apache biasanya melayani file `index.php`. Jika Anda meletakkan file di htdocs/parkir, buka:

http://localhost/parkir/

4. Catatan

- Tabel awal `kendaraan` dan `tarif` sudah diisi (Motor dan Mobil).
- Tabel `histori` akan dibuat secara otomatis saat transaksi dipindahkan.

Jika butuh saya bantu menjalankan atau menyesuaikan koneksi, beri tahu kredensial atau error yang muncul.
