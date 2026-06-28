<?php
require_once "config/koneksi.php";

if (isset($_POST['submit'])) {
    $tanggal    = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jenis      = $_POST['jenis'];
    $nominal    = $_POST['nominal'];

    $stmt = $conn->prepare("INSERT INTO transaksi (tanggal, keterangan, jenis, nominal) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $tanggal, $keterangan, $jenis, $nominal);

    if ($stmt->execute()) {
        header("Location: transaksi.php");
        exit;
    } else {
        $error = "Gagal menyimpan data.";
    }
    $stmt->close();
}

$pageTitle  = "Tambah Transaksi";
$activeMenu = "tambah";
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
    <a class="btn-back" href="transaksi.php"><i class="ti ti-arrow-left"></i> Kembali ke Transaksi</a>

    <div class="form-card">
      <p class="desc">Isi form berikut untuk mencatat transaksi kas baru.</p>

      <?php if (!empty($error)): ?>
        <div class="alert-err"><i class="ti ti-alert-circle"></i> <?= $error ?></div>
      <?php endif; ?>

      <form method="POST">
        <div class="form-row">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" required>
          </div>
          <div class="form-group">
            <label>Jenis Transaksi</label>
            <select name="jenis" required>
              <option value="Pemasukan">Pemasukan</option>
              <option value="Pengeluaran">Pengeluaran</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input type="text" name="keterangan" placeholder="Contoh: Penjualan produk A" required>
        </div>
        <div class="form-group">
          <label>Nominal (Rp)</label>
          <input type="number" name="nominal" placeholder="0" min="0" required>
        </div>
        <button type="submit" name="submit" class="btn-submit btn-submit-blue">
          <i class="ti ti-device-floppy"></i> Simpan Transaksi
        </button>
      </form>
    </div>
  </div>
</div>

<?php require_once "includes/scripts.php"; ?>
</body>
</html>