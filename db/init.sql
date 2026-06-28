CREATE DATABASE IF NOT EXISTS kas_db;
USE kas_db;

CREATE TABLE IF NOT EXISTS transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    jenis ENUM('Pemasukan','Pengeluaran') NOT NULL,
    nominal DECIMAL(12,2) NOT NULL
);

INSERT INTO transaksi (tanggal, keterangan, jenis, nominal) VALUES
('2026-06-01', 'Modal awal', 'Pemasukan', 1000000);