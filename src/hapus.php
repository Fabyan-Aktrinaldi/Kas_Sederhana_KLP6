<?php
require_once "config/koneksi.php";

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM transaksi WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $stmt->close();
}

header("Location: transaksi.php");
exit;