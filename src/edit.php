<?php
require_once "config/koneksi.php";

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM transaksi WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if (!$data) { header("Location: transaksi.php"); exit; }
}

if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $tanggal    = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jenis      = $_POST['jenis'];
    $nominal    = $_POST['nominal'];

    $stmt = $conn->prepare("UPDATE transaksi SET tanggal=?, keterangan=?, jenis=?, nominal=? WHERE id=?");
    $stmt->bind_param("sssdi", $tanggal, $keterangan, $jenis, $nominal, $id);

    if ($stmt->execute()) {
        header("Location: transaksi.php");
        exit;
    } else {
        $error = "Gagal mengupdate data.";
    }
    $stmt->close();
}

$pageTitle   = "Edit Transaksi";
$activeMenu  = "transaksi";
$badgeText   = "Mode Edit";
$badgeColor  = "badge-amber";
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
      <div class="id-badge"><i class="ti ti-hash"></i> ID Transaksi: <?= $data['id'] ?></div>
      <p class="desc">Ubah data transaksi di bawah, lalu klik Update.</p>

      <?php if (!empty($error)): ?>
        <div class="alert-err"><i class="ti ti-alert-circle"></i> <?= $error ?></div>
      <?php endif; ?>

      <form method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="form-row">
          <div class="form-group">
            <label>Tanggal</label>
            <input class="focus-amber" type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required>
          </div>
          <div class="form-group">
            <label>Jenis Transaksi</label>
            <select class="focus-amber" name="jenis" required>
              <option value="Pemasukan"   <?= $data['jenis']==='Pemasukan'   ? 'selected' : '' ?>>Pemasukan</option>
              <option value="Pengeluaran" <?= $data['jenis']==='Pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input class="focus-amber" type="text" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" required>
        </div>
        <div class="form-group">
          <label>Nominal (Rp)</label>
          <input class="focus-amber" type="number" name="nominal" value="<?= $data['nominal'] ?>" min="0" required>
        </div>
        <button type="submit" name="update" class="btn-submit btn-submit-amber">
          <i class="ti ti-check"></i> Update Transaksi
        </button>
      </form>
    </div>
  </div>
</div>

<?php require_once "includes/scripts.php"; ?>
</body>
</html>