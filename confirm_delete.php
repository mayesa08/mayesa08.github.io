<?php
require_once 'koneksi.php';

$id = $_GET['id'];

// Ambil data untuk konfirmasi
$sql = "SELECT t.*, k.jenis FROM transaksi t 
        JOIN kendaraan k ON t.id_kendaraan = k.id 
        WHERE t.id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi - Sistem Parkir Mall</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✅ KONFIRMASI</h1>
            <p>Sistem Parkir Mall</p>
        </div>

        <div class="card compact-card confirmation-card">
            <div class="confirmation-icon">✅</div>
            <h2>Transaksi Selesai</h2>
            
            <div class="transaction-info">
                <div class="info-row-compact">
                    <span class="info-label">No Polisi:</span>
                    <span class="info-value nopol"><?php echo $data['nopol']; ?></span>
                </div>
                <div class="info-row-compact">
                    <span class="info-label">Jenis:</span>
                    <span class="info-value"><?php echo $data['jenis']; ?></span>
                </div>
                <div class="info-row-compact">
                    <span class="info-label">Biaya:</span>
                    <span class="info-value price-total">Rp <?php echo number_format($data['biaya'], 0, ',', '.'); ?></span>
                </div>
            </div>

            <p class="confirmation-text">Simpan transaksi ke histori?</p>

            <div class="form-buttons-compact">
                <a href="hapus.php?id=<?php echo $id; ?>&confirm=1" class="btn btn-success">
                    ✅ Ya, Simpan
                </a>
                <a href="index.php" class="btn btn-secondary">
                    ❌ Batal
                </a>
            </div>
        </div>
    </div>
</body>
</html>
