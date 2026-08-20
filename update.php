<?php
require_once 'koneksi.php';

$id = $_GET['id'];

// Ambil data transaksi
$sql = "SELECT t.*, k.jenis, tar.biaya 
        FROM transaksi t 
        JOIN kendaraan k ON t.id_kendaraan = k.id 
        JOIN tarif tar ON k.id = tar.id_kendaraan 
        WHERE t.id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);


if (!$data) {
    die("Data tidak ditemukan");
}

if ($_POST) {
    $tgl_keluar = date('Y-m-d');
    $jam_keluar = date('H:i:s');
    
    // Hitung lama parkir
    $datetime_masuk = strtotime($data['tgl_masuk'] . ' ' . $data['jam_masuk']);
    $datetime_keluar = strtotime($tgl_keluar . ' ' . $jam_keluar);
    $selisih = $datetime_keluar - $datetime_masuk;
    $lama_jam = ceil($selisih / 3600); // Pembulatan ke atas
    
    // Minimum 1 jam
    if ($lama_jam < 1) {
        $lama_jam = 1;
    }
    
    // Hitung biaya
    $biaya_per_jam = $data['biaya'];
    $total_biaya = $lama_jam * $biaya_per_jam;
    
    // Update transaksi
    $update_sql = "UPDATE transaksi 
                  SET tgl_keluar = '$tgl_keluar', 
                      jam_keluar = '$jam_keluar', 
                      lama = $lama_jam, 
                      biaya = $total_biaya 
                  WHERE id = $id";
    
    if (mysqli_query($conn, $update_sql)) {
        header("Location: struk.php?id=$id");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

// Cek jika tombol proses keluar ditekan
if (isset($_POST['ok'])) {
    header("Location: struk.php?id=$id");
    exit();
}

// Hitung estimasi biaya untuk ditampilkan
$datetime_masuk = strtotime($data['tgl_masuk'] . ' ' . $data['jam_masuk']);
$datetime_sekarang = time();
$selisih = $datetime_sekarang - $datetime_masuk;
$estimasi_jam = ceil($selisih / 3600);
if ($estimasi_jam < 1) $estimasi_jam = 1;
$estimasi_biaya = $estimasi_jam * $data['biaya'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Keluar - Sistem Parkir Mall</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>💰 PROSES KELUAR PARKIR</h1>
            <p>Sistem Manajemen Parkir Mall</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="card compact-card">
            <h2>📋 Data Kendaraan</h2>
            <div class="vehicle-info-compact">
                <div class="info-row-compact">
                    <span class="info-label">No Polisi:</span>
                    <span class="info-value nopol"><?php echo $data['nopol']; ?></span>
                </div>
                <div class="info-row-compact">
                    <span class="info-label">Jenis:</span>
                    <span class="info-value badge <?php echo $data['jenis'] == 'Motor' ? 'badge-motor' : 'badge-mobil'; ?>">
                        <?php echo $data['jenis']; ?>
                    </span>
                </div>
                <div class="info-row-compact">
                    <span class="info-label">Masuk:</span>
                    <span class="info-value"><?php echo date('d/m/Y', strtotime($data['tgl_masuk'])) . ' ' . $data['jam_masuk']; ?></span>
                </div>
                <div class="info-row-compact">
                    <span class="info-label">Biaya/jam:</span>
                    <span class="info-value price">Rp <?php echo number_format($data['biaya'], 0, ',', '.'); ?></span>
                </div>
            </div>
        </div>

        <div class="card compact-card calculation-card">
            <h2>🧮 Perhitungan Biaya</h2>
            <div class="calculation-info-compact">
                <div class="calc-row-compact">
                    <span>Estimasi Lama:</span>
                    <span class="calc-value"><?php echo $estimasi_jam; ?> jam</span>
                </div>
                <div class="calc-row-compact">
                    <span>Estimasi Biaya:</span>
                    <span class="calc-value price-total">Rp <?php echo number_format($estimasi_biaya, 0, ',', '.'); ?></span>
                </div>
            </div>
            <div class="calculation-note">
                *Biaya final dihitung saat tombol ditekan
            </div>
        </div>

        <div class="card compact-card">
            <h2>⏰ Waktu Keluar</h2>
            <form method="POST" class="form-compact">
                <div class="form-group-compact">
                    <label>Waktu Keluar (Otomatis):</label>
                    <input type="text" value="<?php echo date('d-m-Y H:i:s'); ?> - WIB" readonly class="readonly-input compact">
                </div>
                
                <div class="form-buttons-compact">
                    <button type="submit" class="btn btn-success" name="ok">
                        ✅ Proses Keluar & Bayar
                    </button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
