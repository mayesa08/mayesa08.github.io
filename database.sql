-- Database schema for Sistem Parkir
CREATE DATABASE IF NOT EXISTS `parkir` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `parkir`;

-- Tabel kendaraan: jenis kendaraan (Motor/Mobil)
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `jenis` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data awal kendaraan
INSERT INTO `kendaraan` (`id`, `jenis`) VALUES
(1, 'Motor'),
(2, 'Mobil');

-- Tabel tarif: biaya per jam per jenis kendaraan
CREATE TABLE IF NOT EXISTS `tarif` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_kendaraan` INT NOT NULL,
  `biaya` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data tarif default
INSERT INTO `tarif` (`id_kendaraan`, `biaya`) VALUES
(1, 3000),
(2, 5000);

-- Tabel transaksi: catatan kendaraan masuk/keluar
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tgl_masuk` DATE NOT NULL,
  `jam_masuk` TIME NOT NULL,
  `tgl_keluar` DATE DEFAULT NULL,
  `jam_keluar` TIME DEFAULT NULL,
  `nopol` VARCHAR(20) NOT NULL,
  `id_kendaraan` INT NOT NULL,
  `lama` INT DEFAULT NULL,
  `biaya` INT DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan`(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Histori akan dibuat otomatis sebagai salinan struktur transaksi saat pertama kali dipindahkan
