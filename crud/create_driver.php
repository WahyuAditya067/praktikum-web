<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

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
    
    $sql = "INSERT INTO drivers (driver_id, name, number, team, country, dob, podiums, points, grands_prix, championships, image) 
            VALUES ('$driver_id', '$name', '$number', '$team', '$country', '$dob', '$podiums', '$points', '$grands_prix', '$championships', '$image')";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='crud_drivers.php';</script>";
    } else {
        echo "Error euy: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Pembalap - F1Pedia</title>
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
      <h2>Tambah Pembalap Baru</h2>
      
      <form method="POST" action="">
        <div class="form-group">
          <label>Driver ID (lowercase, contoh: verstappen):</label>
          <input type="text" name="driver_id" placeholder="verstappen" required>
        </div>

        <div class="form-group">
          <label>Nama Pembalap:</label>
          <input type="text" name="name" placeholder="Max VERSTAPPEN" required>
        </div>
        
        <div class="form-group">
          <label>Nomor:</label>
          <input type="text" name="number" placeholder="1" required>
        </div>
        
        <div class="form-group">
          <label>Tim:</label>
          <input type="text" name="team" placeholder="Red Bull Racing" required>
        </div>
        
        <div class="form-group">
          <label>Negara:</label>
          <input type="text" name="country" placeholder="Netherlands" required>
        </div>

        <div class="form-group">
          <label>Tanggal Lahir:</label>
          <input type="text" name="dob" placeholder="30 September 1997" required>
        </div>

        <div class="form-group">
          <label>Podiums:</label>
          <input type="text" name="podiums" placeholder="107" required>
        </div>

        <div class="form-group">
          <label>Points:</label>
          <input type="text" name="points" placeholder="2805.5" required>
        </div>

        <div class="form-group">
          <label>Grand Prix Entries:</label>
          <input type="text" name="grands_prix" placeholder="193" required>
        </div>

        <div class="form-group">
          <label>Championships:</label>
          <input type="text" name="championships" placeholder="3" required>
        </div>

        <div class="form-group">
          <label>Image URL:</label>
          <input type="text" name="image" placeholder="https://www.formula1.com/..." required>
        </div>
        
        <button type="submit" class="btn-submit">Submit</button>
        <a href="crud_drivers.php" class="btn-cancel">Batal</a>
      </form>
    </div>
  </main>

  <footer>
    <p>Referensi: <a href="https://www.formula1.com/">Formula1.com</a></p>
  </footer>
</body>
</html>