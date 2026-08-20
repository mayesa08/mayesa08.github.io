# Sistem Parkir — Deskripsi
📌 Deskripsi

Sistem Manajemen Parkir adalah aplikasi berbasis web yang dirancang untuk membantu proses pengelolaan kendaraan di area parkir secara lebih terstruktur dan efisien. Sistem ini digunakan untuk mencatat kendaraan yang masuk, mengelola data kendaraan yang sedang parkir, memproses kendaraan keluar, menghitung biaya parkir, serta menyimpan riwayat transaksi.

Aplikasi ini menggunakan PHP dan MySQL sebagai teknologi utama. Data transaksi parkir disimpan dalam database sehingga dapat ditampilkan kembali melalui halaman histori dan digunakan untuk melihat total transaksi maupun pendapatan parkir.

Sistem ini cocok digunakan sebagai aplikasi sederhana untuk pengelolaan parkir mall, gedung, kantor, atau area parkir lainnya.

🎯 Tujuan

Sistem ini dibuat dengan tujuan untuk:

Mempermudah proses pencatatan kendaraan masuk dan keluar.
Mengurangi pencatatan transaksi parkir secara manual.
Membantu menghitung biaya parkir berdasarkan durasi kendaraan.
Menyimpan data transaksi secara terstruktur menggunakan database.
Memudahkan petugas melihat kendaraan yang masih berada di area parkir.
Menyediakan histori transaksi parkir yang telah selesai.
Membuat proses pengelolaan parkir menjadi lebih cepat dan terorganisir.
✨ Fitur
🚗 1. Input Data Parkir

Petugas dapat memasukkan data kendaraan yang baru memasuki area parkir.

Data yang dapat dimasukkan meliputi:

Nama petugas
Nomor polisi kendaraan
Jenis kendaraan
Waktu masuk

Waktu masuk dapat dicatat oleh sistem sehingga proses pencatatan menjadi lebih praktis.

📋 2. Data Kendaraan Aktif

Sistem menampilkan daftar kendaraan yang masih berada di area parkir.

Informasi yang ditampilkan antara lain:

Nomor polisi
Jenis kendaraan
Waktu masuk
Data transaksi kendaraan

Petugas dapat memilih kendaraan tertentu untuk melanjutkan proses kendaraan keluar.

🚪 3. Proses Kendaraan Keluar

Ketika kendaraan meninggalkan area parkir, petugas dapat memproses transaksi tersebut.

Sistem akan:

Mencatat waktu keluar.
Menghitung lama kendaraan parkir.
Menghitung biaya parkir.
Menampilkan rincian transaksi.
Menyelesaikan transaksi kendaraan.
💰 4. Perhitungan Biaya Parkir

Sistem melakukan perhitungan biaya berdasarkan data kendaraan dan durasi parkir.

Dengan adanya perhitungan otomatis, petugas tidak perlu menghitung biaya parkir secara manual.

🧾 5. Cetak Struk

Setelah transaksi selesai, sistem dapat menampilkan informasi transaksi dalam bentuk struk.

Struk berisi:

Nomor polisi
Jenis kendaraan
Waktu masuk
Waktu keluar
Lama parkir
Total pembayaran
📊 6. Histori Transaksi

Transaksi parkir yang telah selesai dapat disimpan dan ditampilkan pada halaman histori.

Histori dapat digunakan untuk melihat:

Daftar transaksi sebelumnya.
Jumlah transaksi.
Total pendapatan parkir.
Informasi kendaraan yang telah keluar.
✏️ 7. Update Data

Sistem menyediakan fitur untuk mengubah atau memperbarui data transaksi apabila terdapat kesalahan pada data yang telah dimasukkan.

🗑️ 8. Hapus Data

Data tertentu dapat dihapus melalui sistem sesuai kebutuhan pengelolaan transaksi.

🔐 9. Session

Sistem menggunakan PHP Session untuk membantu mengelola data dan proses selama penggunaan aplikasi.

🔄 Alur Sistem
Kendaraan Masuk
       ↓
Input Data Kendaraan
       ↓
Data Disimpan ke Database
       ↓
Kendaraan Masuk Daftar Parkir Aktif
       ↓
Kendaraan Keluar
       ↓
Hitung Durasi Parkir
       ↓
Hitung Biaya Parkir
       ↓
Transaksi Diselesaikan
       ↓
Cetak / Tampilkan Struk
       ↓
Data Masuk ke Histori
🗄️ Database

Aplikasi menggunakan MySQL sebagai database untuk menyimpan data yang berkaitan dengan sistem parkir.

Database digunakan untuk menyimpan dan mengelola informasi seperti:

Data kendaraan
Jenis kendaraan
Nomor polisi
Waktu masuk
Waktu keluar
Durasi parkir
Biaya parkir
Data transaksi

Penggunaan database membuat data tidak hanya tersimpan sementara di halaman website, tetapi dapat digunakan kembali untuk menampilkan histori dan informasi transaksi.

🛠️ Teknologi yang Digunakan
Teknologi	Kegunaan
HTML5	Membuat struktur dan elemen halaman website
CSS3	Mengatur desain, layout, warna, ukuran, dan tampilan website
PHP	Mengatur logika sistem, proses transaksi, dan komunikasi dengan database
MySQL	Menyimpan dan mengelola data kendaraan serta transaksi
XAMPP	Menyediakan local server Apache dan MySQL
Visual Studio Code	Code editor untuk mengembangkan project
📄 Struktur Halaman

Beberapa bagian/halaman utama dalam sistem meliputi:

Halaman Utama / Data Parkir — menampilkan kendaraan yang sedang parkir.
Halaman Input Parkir — digunakan untuk memasukkan kendaraan baru.
Halaman Proses Keluar — digunakan untuk menyelesaikan transaksi kendaraan keluar.
Halaman Struk — menampilkan rincian pembayaran parkir.
Halaman Histori — menampilkan transaksi parkir yang telah selesai.
Halaman Update — digunakan untuk memperbarui data.
Halaman Konfirmasi — digunakan untuk memastikan tindakan tertentu sebelum diproses.
💡 Konsep yang Diterapkan

Project ini menerapkan beberapa konsep dasar dalam pengembangan aplikasi web, antara lain:

Frontend development menggunakan HTML dan CSS.
Backend development menggunakan PHP.
Database management menggunakan MySQL.
CRUD (Create, Read, Update, Delete) untuk pengelolaan data.
Session management menggunakan PHP Session.
Form processing untuk menerima input dari pengguna.
Perhitungan transaksi otomatis untuk menentukan biaya parkir.
Relasi antara website dengan database untuk menyimpan dan mengambil data.
🎯 Kesimpulan

Sistem Manajemen Parkir merupakan aplikasi web sederhana yang membantu mengelola proses parkir secara digital, mulai dari kendaraan masuk hingga kendaraan keluar. Dengan menggunakan HTML5, CSS3, PHP, dan MySQL, sistem mampu mengelola data kendaraan dan transaksi secara lebih terstruktur.

Project ini juga dapat dikembangkan lebih lanjut dengan menambahkan fitur seperti login admin/petugas, dashboard statistik, pencarian kendaraan, filter transaksi, pengaturan tarif parkir, laporan pendapatan, serta sistem cetak laporan.

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
