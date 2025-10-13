<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM drivers WHERE id=$id";
$result = $conn->query($sql);

if ($result) {
    echo "<script>alert('Data berhasil dihapus'); window.location='crud_drivers.php';</script>";
} else {
    echo "Error hapus data euy: " . $conn->error;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hapus Pembalap - F1Pedia</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>F1Pedia</h1>
  </header>

  <main>
    <div class="crud-container">
      <p>Menghapus data...</p>
      <a href="crud_drivers.php">Kembali ke daftar</a>
    </div>
  </main>

  <footer>
    <p>Referensi: <a href="https://www.formula1.com/">Formula1.com</a></p>
  </footer>
</body>
</html>