<?php
require_once 'koneksi.php';

$id = $_GET['id'];

// Cek jika ada parameter confirm
if (!isset($_GET['confirm'])) {
    header("Location: confirm_delete.php?id=$id");
    exit();
}

// Buat tabel histori jika belum ada
$sql_create_histori = "CREATE TABLE IF NOT EXISTS histori LIKE transaksi";
mysqli_query($conn, $sql_create_histori);

// Insert ke histori
$sql_insert_histori = "INSERT INTO histori SELECT * FROM transaksi WHERE id = $id";

// Hapus dari transaksi
$sql_delete = "DELETE FROM transaksi WHERE id = $id";

if (mysqli_query($conn, $sql_insert_histori) && mysqli_query($conn, $sql_delete)) {
    header("Location: index.php?message=Data berhasil dipindahkan ke histori");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>