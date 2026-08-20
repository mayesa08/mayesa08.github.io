<?php
session_start();
require_once 'koneksi.php';

if ($_POST) {
    $nama = $_POST['nama'];
    $nopol = $_POST['nopol'];
    $id_kendaraan = $_POST['id_kendaraan'];
    
    // Insert data transaksi
    $tgl_masuk = date('Y-m-d');
    $jam_masuk = date('H:i:s');
    
    $sql = "INSERT INTO transaksi (tgl_masuk, jam_masuk, nopol, id_kendaraan) 
            VALUES ('$tgl_masuk', '$jam_masuk', '$nopol', '$id_kendaraan')";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['last_id'] = mysqli_insert_id($conn);
        header("Location: index.html");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Parkir - Sistem Parkir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚗 INPUT DATA PARKIR</h1>
            <p>Sistem Manajemen Parkir</p>
        </div>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="card" style="max-width: 500px; margin: 0 auto;">
            <h2>📝 Form Input Kendaraan</h2>
            <form method="POST" class="form">
                <div class="form-group">
                    <label for="nama">Nama Petugas:</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama petugas">
                </div>
                
                <div class="form-group">
                    <label for="nopol">Nomor Polisi:</label>
                    <input type="text" id="nopol" name="nopol" required placeholder="Contoh: B 1234 ABC">
                </div>
                
                <div class="form-group">
                    <label for="id_kendaraan">Jenis Kendaraan:</label>
                    <select id="id_kendaraan" name="id_kendaraan" required>
                        <option value="">Pilih Jenis Kendaraan</option>
                        <option value="1">🏍️ Motor - Rp 3.000/jam</option>
                        <option value="2">🚗 Mobil - Rp 5.000/jam</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Waktu Masuk :</label>
                    <input type="text" value="<?php echo date('d-m-Y H:i:s'); ?> - WIB" readonly class="readonly-input">
                </div>
                
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">💾 Simpan Data</button>
                    <a href="index.html" class="btn btn-secondary">📋 Lihat Data</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
