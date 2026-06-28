<?php
require_once "config/koneksi.php";

$res_masuk  = $conn->query("SELECT SUM(nominal) AS total FROM transaksi WHERE jenis='Pemasukan'");
$res_keluar = $conn->query("SELECT SUM(nominal) AS total FROM transaksi WHERE jenis='Pengeluaran'");
$total_pemasukan  = $res_masuk->fetch_assoc()['total']  ?? 0;
$total_pengeluaran = $res_keluar->fetch_assoc()['total'] ?? 0;
$saldo = $total_pemasukan - $total_pengeluaran;
$res_recent = $conn->query("SELECT * FROM transaksi ORDER BY id DESC LIMIT 5");

$pageTitle  = "Dashboard";
$activeMenu = "dashboard";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?> — KasSederhana</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php require_once "includes/sidebar.php"; ?>

<div class="main" id="main">
  <?php require_once "includes/topbar.php"; ?>

  <div class="content">

    <div class="stat-grid">
      <div class="stat-card">
        <div class="lbl"><i class="ti ti-trending-up green"></i> Total Pemasukan</div>
        <div class="val green">Rp <?= number_format($total_pemasukan, 0, ',', '.') ?></div>
        <div class="hint">Semua pemasukan tercatat</div>
      </div>
      <div class="stat-card">
        <div class="lbl"><i class="ti ti-trending-down red"></i> Total Pengeluaran</div>
        <div class="val red">Rp <?= number_format($total_pengeluaran, 0, ',', '.') ?></div>
        <div class="hint">Semua pengeluaran tercatat</div>
      </div>
      <div class="stat-card">
        <div class="lbl"><i class="ti ti-wallet blue"></i> Saldo</div>
        <div class="val blue">Rp <?= number_format($saldo, 0, ',', '.') ?></div>
        <div class="hint">Pemasukan - Pengeluaran</div>
      </div>
    </div>

    <div class="sec-head">
      <h3>Transaksi Terbaru</h3>
      <a class="btn" href="transaksi.php">Lihat semua <i class="ti ti-arrow-right"></i></a>
    </div>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>Tanggal</th><th>Keterangan</th><th>Jenis</th><th>Nominal</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($res_recent->num_rows > 0): ?>
            <?php while ($row = $res_recent->fetch_assoc()): ?>
            <tr>
              <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
              <td><?= htmlspecialchars($row['keterangan']) ?></td>
              <td>
                <span class="pill <?= $row['jenis']==='Pemasukan' ? 'pill-green' : 'pill-red' ?>">
                  <i class="ti ti-arrow-<?= $row['jenis']==='Pemasukan' ? 'up' : 'down' ?>"></i>
                  <?= $row['jenis'] ?>
                </span>
              </td>
              <td class="<?= $row['jenis']==='Pemasukan' ? 'green' : 'red' ?>">
                Rp <?= number_format($row['nominal'], 0, ',', '.') ?>
              </td>
            </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="4" style="text-align:center;padding:24px" class="muted">Belum ada transaksi</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

<?php require_once "includes/scripts.php"; ?>
</body>
</html>