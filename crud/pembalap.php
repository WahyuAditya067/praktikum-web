<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Ambil data pembalap dari database
$sql = "SELECT * FROM drivers";
$result = $conn->query($sql);
$drivers = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $drivers[$row['driver_id']] = [
            'name' => $row['name'],
            'number' => $row['number'],
            'team' => $row['team'],
            'country' => $row['country'],
            'dob' => $row['dob'],
            'podiums' => $row['podiums'],
            'points' => $row['points'],
            'grands_prix' => $row['grands_prix'],
            'championships' => $row['championships'],
            'image' => $row['image']
        ];
    }
}

// Ambil ID pembalap dari URL
$driver_id = isset($_GET['id']) ? $_GET['id'] : '';

// Cek apakah pembalap ada
if (!isset($drivers[$driver_id])) {
    header("Location: index.php");
    exit();
}

$driver = $drivers[$driver_id];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($driver['name']); ?> - F1Pedia</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>F1Pedia</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="jadwal.php">Jadwal</a></li>
        <li><a href="hasil.php">Hasil</a></li>
        <li><a href="tim.php">Tim</a></li>
        <li><a href="klasemen.php">Klasemen</a></li>
        <li><a href="crud_drivers.php">Kelola Data</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="driver-profile">
      <a href="index.php" class="back-button">← Kembali ke Beranda</a>
      
      <div class="driver-number"><?php echo htmlspecialchars($driver['number']); ?></div>
      
      <div class="driver-header">
        <div class="driver-image">
          <img src="<?php echo htmlspecialchars($driver['image']); ?>" alt="<?php echo htmlspecialchars($driver['name']); ?>">
        </div>
        
        <div class="driver-details">
          <h1><?php echo htmlspecialchars($driver['name']); ?></h1>
          <p class="driver-country">
            <?php echo htmlspecialchars($driver['country']); ?>
          </p>
          
          <div class="driver-info-grid">
            <div class="info-item">
              <div class="info-label">Tim</div>
              <div class="info-value"><?php echo htmlspecialchars($driver['team']); ?></div>
            </div>
            
            <div class="info-item">
              <div class="info-label">Tanggal Lahir</div>
              <div class="info-value"><?php echo htmlspecialchars($driver['dob']); ?></div>
            </div>
            
            <div class="info-item">
              <div class="info-label">Nomor Pembalap</div>
              <div class="info-value">#<?php echo htmlspecialchars($driver['number']); ?></div>
            </div>
            
            <div class="info-item">
              <div class="info-label">Kejuaraan Dunia</div>
              <div class="info-value"><?php echo htmlspecialchars($driver['championships']); ?>x</div>
            </div>
          </div>
        </div>
      </div>

      <div class="stats-container">
        <div class="stat-card">
          <div class="stat-value"><?php echo htmlspecialchars($driver['grands_prix']); ?></div>
          <div class="stat-label">Grand Prix Entries</div>
        </div>
        
        <div class="stat-card">
          <div class="stat-value"><?php echo htmlspecialchars($driver['podiums']); ?></div>
          <div class="stat-label">Podiums</div>
        </div>
        
        <div class="stat-card">
          <div class="stat-value"><?php echo htmlspecialchars($driver['points']); ?></div>
          <div class="stat-label">Career Points</div>
        </div>
        
        <div class="stat-card">
          <div class="stat-value"><?php echo htmlspecialchars($driver['championships']); ?></div>
          <div class="stat-label">World Championships</div>
        </div>
      </div>

    </div>
  </main>

  <footer>
    <p>Referensi: <a href="https://www.formula1.com/">Formula1.com</a></p>
  </footer>
</body>
</html>