<?php
require_once "config/koneksi.php";

$pageTitle  = "Beranda";
$activeMenu = "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KasSederhana</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" href="assets/style.css">
  <style>
    .landing { display: flex; align-items: center; justify-content: center; min-height: 100vh; width: 100%; }
    .card { background: #fff; border-radius: 12px; padding: 40px; width: 420px; border: 1px solid #e2e8f0; text-align: center; }
    .logo { width: 56px; height: 56px; background: #3b82f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
    .logo i { font-size: 28px; color: #fff; }
    .card h1 { font-size: 20px; font-weight: 600; color: #1e293b; margin-bottom: 4px; }
    .card p.sub { font-size: 13px; color: #64748b; margin-bottom: 24px; }
    .status { padding: 10px 14px; border-radius: 8px; font-size: 13px; font-weight: 500; margin-bottom: 24px; display: flex; align-items: center; gap: 8px; justify-content: center; }
    .status.ok  { background: #dcfce7; color: #15803d; }
    .status.err { background: #fee2e2; color: #b91c1c; }
    .menu { display: flex; flex-direction: column; gap: 10px; }
    .menu a { display: flex; align-items: center; gap: 10px; padding: 12px 16px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 500; }
    .menu a:hover { opacity: 0.88; }
    .menu a i { font-size: 18px; }
    .btn-blue  { background: #3b82f6; color: #fff; }
    .btn-green { background: #22c55e; color: #fff; }
    .btn-amber { background: #f59e0b; color: #fff; }
    hr { border: none; border-top: 1px solid #e2e8f0; margin: 20px 0; }
    .info { font-size: 12px; color: #94a3b8; }
  </style>
</head>
<body>
<div class="landing">
  <div class="card">
    <div class="logo"><i class="ti ti-wallet"></i></div>
    <h1>KasSederhana</h1>
    <p class="sub">Sistem pencatatan kas yang simpel & rapi</p>

    <div class="status <?= $conn ? 'ok' : 'err' ?>">
      <i class="ti ti-<?= $conn ? 'circle-check' : 'circle-x' ?>"></i>
      <?= $conn ? 'Koneksi database berhasil' : 'Koneksi database gagal' ?>
    </div>

    <div class="menu">
      <a class="btn-blue"  href="dashboard.php"><i class="ti ti-layout-dashboard"></i> Dashboard</a>
      <a class="btn-green" href="transaksi.php"><i class="ti ti-list"></i> Data Transaksi</a>
      <a class="btn-amber" href="tambah.php"><i class="ti ti-plus"></i> Tambah Transaksi</a>
    </div>

    <hr>
    <p class="info">Apache + PHP 8.2 &nbsp;·&nbsp; MySQL 8.0 &nbsp;·&nbsp; Docker</p>
  </div>
</div>
</body>
</html>