<?php
require_once 'koneksi.php';

// Buat tabel histori jika belum ada
$sql_create_histori = "CREATE TABLE IF NOT EXISTS histori LIKE transaksi";
mysqli_query($conn, $sql_create_histori);

// Ambil semua data histori
$sql = "SELECT t.*, k.jenis 
        FROM histori t 
        JOIN kendaraan k ON t.id_kendaraan = k.id 
        ORDER BY t.tgl_keluar DESC, t.jam_keluar DESC";
$result = mysqli_query($conn, $sql);

// Hitung total pendapatan
$sql_total = "SELECT SUM(biaya) as total FROM histori";
$result_total = mysqli_query($conn, $sql_total);
$total_data = mysqli_fetch_assoc($result_total);
$total_pendapatan = $total_data['total'] ? $total_data['total'] : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Parkir - Sistem Parkir Mall</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 HISTORI PARKIR</h1>
            <p>Sistem Manajemen Parkir Mall</p>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>📈 Riwayat Transaksi</h2>
                <div class="header-actions">
                    <a href="index.html" class="btn btn-primary">📋 Data Aktif</a>
                </div>
            </div>

            <div class="stats-summary">
                <div class="stat-total">
                    <div class="stat-icon">💰</div>
                    <div class="stat-info">
                        <h3>Total Pendapatan</h3>
                        <p class="price-total">Rp <?php echo number_format($total_pendapatan, 0, ',', '.'); ?></p>
                    </div>
                </div>
                <div class="stat-count">
                    <div class="stat-icon">📄</div>
                    <div class="stat-info">
                        <h3>Total Transaksi</h3>
                        <p><?php echo mysqli_num_rows($result); ?> transaksi</p>
                    </div>
                </div>
            </div>

            <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Polisi</th>
                            <th>Jenis</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Lama</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)): 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['tgl_masuk'])); ?></td>
                            <td>
                                <span class="nopol"><?php echo $row['nopol']; ?></span>
                            </td>
                            <td>
                                <span class="badge <?php echo $row['jenis'] == 'Motor' ? 'badge-motor' : 'badge-mobil'; ?>">
                                    <?php echo $row['jenis'] == 'Motor' ? '🏍️ Motor' : '🚗 Mobil'; ?>
                                </span>
                            </td>
                            <td><?php echo $row['jam_masuk']; ?></td>
                            <td><?php echo $row['jam_keluar']; ?></td>
                            <td><?php echo $row['lama']; ?> jam</td>
                            <td class="price">Rp <?php echo number_format($row['biaya'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">📊</div>
                <h3>Belum Ada Histori</h3>
                <p>Belum ada transaksi yang disimpan di histori.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
