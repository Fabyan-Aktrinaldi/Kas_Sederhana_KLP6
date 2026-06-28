<?php
require_once "config/koneksi.php";
$result = $conn->query("SELECT * FROM transaksi ORDER BY id DESC");

$pageTitle  = "Data Transaksi";
$activeMenu = "transaksi";
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
    <div class="sec-head">
      <h3>Semua Transaksi</h3>
      <a class="btn btn-primary" href="tambah.php"><i class="ti ti-plus"></i> Tambah Transaksi</a>
    </div>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th style="width:50px">ID</th>
            <th style="width:120px">Tanggal</th>
            <th>Keterangan</th>
            <th style="width:120px">Jenis</th>
            <th style="width:140px">Nominal</th>
            <th style="width:90px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td class="muted">#<?= str_pad($row['id'], 3, '0', STR_PAD_LEFT) ?></td>
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
              <td>
                <a class="act-btn" href="edit.php?id=<?= $row['id'] ?>" title="Edit">
                  <i class="ti ti-edit"></i>
                </a>
                <a class="act-btn act-del"
                   href="hapus.php?id=<?= $row['id'] ?>"
                   onclick="return confirm('Yakin hapus transaksi ini?')"
                   title="Hapus">
                  <i class="ti ti-trash"></i>
                </a>
              </td>
            </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="6" style="text-align:center;padding:32px" class="muted">Belum ada data transaksi</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require_once "includes/scripts.php"; ?>
</body>
</html>