<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM drivers WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $driver = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driver_id = $_POST['driver_id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $team = $_POST['team'];
    $country = $_POST['country'];
    $dob = $_POST['dob'];
    $podiums = $_POST['podiums'];
    $points = $_POST['points'];
    $grands_prix = $_POST['grands_prix'];
    $championships = $_POST['championships'];
    $image = $_POST['image'];
    
    $sql = "UPDATE drivers SET 
            driver_id='$driver_id',
            name='$name', 
            number='$number', 
            team='$team', 
            country='$country',
            dob='$dob',
            podiums='$podiums',
            points='$points',
            grands_prix='$grands_prix',
            championships='$championships',
            image='$image'
            WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='crud_drivers.php';</script>";
    } else {
        echo "Error update data euy: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pembalap - F1Pedia</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="crud-style.css">
</head>
<body>
  <header>
    <h1>F1Pedia</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="crud_drivers.php">Kelola Pembalap</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="form-container">
      <h2>Edit Data Pembalap</h2>
      
      <form method="POST" action="">
        <div class="form-group">
          <label>Driver ID:</label>
          <input type="text" name="driver_id" value="<?= $driver['driver_id']; ?>" required>
        </div>

        <div class="form-group">
          <label>Nama Pembalap:</label>
          <input type="text" name="name" value="<?= $driver['name']; ?>" required>
        </div>
        
        <div class="form-group">
          <label>Nomor:</label>
          <input type="text" name="number" value="<?= $driver['number']; ?>" required>
        </div>
        
        <div class="form-group">
          <label>Tim:</label>
          <input type="text" name="team" value="<?= $driver['team']; ?>" required>
        </div>
        
        <div class="form-group">
          <label>Negara:</label>
          <input type="text" name="country" value="<?= $driver['country']; ?>" required>
        </div>

        <div class="form-group">
          <label>Tanggal Lahir:</label>
          <input type="text" name="dob" value="<?= $driver['dob']; ?>" required>
        </div>

        <div class="form-group">
          <label>Podiums:</label>
          <input type="text" name="podiums" value="<?= $driver['podiums']; ?>" required>
        </div>

        <div class="form-group">
          <label>Points:</label>
          <input type="text" name="points" value="<?= $driver['points']; ?>" required>
        </div>

        <div class="form-group">
          <label>Grand Prix Entries:</label>
          <input type="text" name="grands_prix" value="<?= $driver['grands_prix']; ?>" required>
        </div>

        <div class="form-group">
          <label>Championships:</label>
          <input type="text" name="championships" value="<?= $driver['championships']; ?>" required>
        </div>

        <div class="form-group">
          <label>Image URL:</label>
          <input type="text" name="image" value="<?= $driver['image']; ?>" required>
        </div>
        
        <button type="submit" class="btn-submit">Update</button>
        <a href="crud_drivers.php" class="btn-cancel">Batal</a>
      </form>
    </div>
  </main>

  <footer>
    <p>Referensi: <a href="https://www.formula1.com/">Formula1.com</a></p>
  </footer>
</body>
</html><?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM drivers WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $driver = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $tim = $_POST['tim'];
    $negara = $_POST['negara'];
    
    $sql = "UPDATE drivers SET nama='$nama', nomor='$nomor', tim='$tim', negara='$negara' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='crud_drivers.php';</script>";
    } else {
        echo "Error update data euy: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pembalap - F1Pedia</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="crud-style.css">
</head>
<body>
  <header>
    <h1>F1Pedia</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="crud_drivers.php">Kelola Pembalap</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="form-container">
      <h2>Edit Data Pembalap</h2>
      
      <form method="POST" action="">
        <div class="form-group">
          <label>Nama Pembalap:</label>
          <input type="text" name="nama" value="<?= $driver['nama']; ?>" required>
        </div>
        
        <div class="form-group">
          <label>Nomor:</label>
          <input type="text" name="nomor" value="<?= $driver['nomor']; ?>" required>
        </div>
        
        <div class="form-group">
          <label>Tim:</label>
          <input type="text" name="tim" value="<?= $driver['tim']; ?>" required>
        </div>
        
        <div class="form-group">
          <label>Negara:</label>
          <input type="text" name="negara" value="<?= $driver['negara']; ?>" required>
        </div>
        
        <button type="submit" class="btn-submit">Update</button>
        <a href="crud_drivers.php" class="btn-cancel">Batal</a>
      </form>
    </div>
  </main>

  <footer>
    <p>Referensi: <a href="https://www.formula1.com/">Formula1.com</a></p>
  </footer>
</body>
</html>