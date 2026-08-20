<?php
require_once 'koneksi.php';

$id = $_GET['id'];

// Ambil data transaksi lengkap
$sql = "SELECT t.*, k.jenis 
        FROM transaksi t 
        JOIN kendaraan k ON t.id_kendaraan = k.id 
        WHERE t.id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Parkir - Sistem Parkir Mall</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container struk-container">
        <div class="struk-compact">
            <div class="struk-header-compact">
                <div class="struk-logo">🅿️</div>
                <h2>PARKIR MALL</h2>
                <div class="struk-divider"></div>
            </div>
            
            <div class="struk-body-compact">
                <div class="struk-row-compact">
                    <span>No Polisi:</span>
                    <span class="nopol"><?php echo $data['nopol']; ?></span>
                </div>
                <div class="struk-row-compact">
                    <span>Jenis:</span>
                    <span><?php echo $data['jenis']; ?></span>
                </div>
                <div class="struk-row-compact">
                    <span>Masuk:</span>
                    <span><?php echo date('d/m/y', strtotime($data['tgl_masuk'])) . ' ' . substr($data['jam_masuk'], 0, 5); ?></span>
                </div>
                <div class="struk-row-compact">
                    <span>Keluar:</span>
                    <span><?php echo date('d/m/y', strtotime($data['tgl_keluar'])) . ' ' . substr($data['jam_keluar'], 0, 5); ?></span>
                </div>
                <div class="struk-row-compact">
                    <span>Lama:</span>
                    <span><?php echo $data['lama']; ?> jam</span>
                </div>
                
                <div class="struk-divider-compact"></div>
                
                <div class="struk-row-compact total">
                    <span>TOTAL:</span>
                    <span class="price-total">Rp <?php echo number_format($data['biaya'], 0, ',', '.'); ?></span>
                </div>
            </div>
            
            <div class="struk-footer-compact">
                <p>Terima kasih</p>
                <div class="struk-divider-compact"></div>
                <p class="struk-info">*Bukti pembayaran</p>
            </div>
        </div>
        
        <div class="struk-actions no-print">
            <a href="confirm_delete.php?id=<?php echo $id; ?>" class="btn btn-success">
                ✅ Selesai & Simpan
            </a>
            <button onclick="window.print()" class="btn btn-primary">
                🖨️ Cetak Ulang
            </button>
        </div>
    </div>
    
    <script>
        // Otomatis print struk
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        }
    </script>
</body>
</html>