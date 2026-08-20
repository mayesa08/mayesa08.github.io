<?php
session_start();
require_once 'koneksi.php';

// Ambil data transaksi yang belum keluar
$sql = "SELECT t.*, k.jenis 
        FROM transaksi t 
        JOIN kendaraan k ON t.id_kendaraan = k.id 
        WHERE t.jam_keluar IS NULL 
        ORDER BY t.tgl_masuk DESC, t.jam_masuk DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sistem Parkir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚗 FORM PARKIR</h1>
            <p>Sistem Manajemen Parkir</p>
        </div>

        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-success"><?php echo $_GET['message']; ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h2>📋 Daftar Kendaraan Sedang Parkir</h2>
                <div class="header-actions">
                    <a href="login.php" class="btn btn-primary">➕ Input Baru</a>
                    <a href="histori.php" class="btn btn-secondary">📊 Lihat Histori</a>
                </div>
            </div>

            <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Masuk</th>
                            <th>Jam Masuk</th>
                            <th>No Polisi</th>
                            <th>Jenis</th>
                            <th>Durasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)): 
                            // Hitung durasi parkir
                            $datetime_masuk = strtotime($row['tgl_masuk'] . ' ' . $row['jam_masuk']);
                            $datetime_sekarang = time();
                            $selisih = $datetime_sekarang - $datetime_masuk;
                            $lama_jam = floor($selisih / 3600);
                            $lama_menit = floor(($selisih % 3600) / 60);
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['tgl_masuk'])); ?></td>
                            <td><?php echo $row['jam_masuk']; ?></td>
                            <td>
                                <span class="nopol"><?php echo $row['nopol']; ?></span>
                            </td>
                            <td>
                                <span class="badge <?php echo $row['jenis'] == 'Motor' ? 'badge-motor' : 'badge-mobil'; ?>">
                                    <?php echo $row['jenis'] == 'Motor' ? '🏍️ Motor' : '🚗 Mobil'; ?>
                                </span>
                            </td>
                            <td>
                                <span class="duration">
                                    <?php echo $lama_jam . 'j ' . $lama_menit . 'm'; ?>
                                </span>
                            </td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                    💰 Proses Keluar
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">🚗</div>
                <h3>Tidak Ada Kendaraan Parkir</h3>
                <p>Belum ada kendaraan yang sedang parkir saat ini.</p>
                <a href="login.php" class="btn btn-primary">Input Kendaraan Baru</a>
            </div>
            <?php endif; ?>
        </div>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-icon">🏍️</div>
                <div class="stat-info">
                    <h3>Motor</h3>
                    <p>Rp 3.000/jam</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🚗</div>
                <div class="stat-info">
                    <h3>Mobil</h3>
                    <p>Rp 5.000/jam</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
