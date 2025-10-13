<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

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

$username = $_SESSION['username'];
$login_time = isset($_SESSION['login_time']) ? $_SESSION['login_time'] : 'Tidak tersedia';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>F1Pedia - Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  <header>
    <div class="user-info">
      <p><strong>User:</strong> <?php echo htmlspecialchars($username); ?></p>
      <p><strong>Login:</strong> <?php echo htmlspecialchars($login_time); ?></p>
      <a href="logout.php" class="btn-logout">Logout</a>
    </div>
    
    <h1>F1Pedia</h1>
    <nav>
    <ul>
    <li class="mega-dropdown">
      <a href="jadwal.php">Jadwal</a>
      <div class="jadwal-menu">
        <div class="race-container">
          <div class="race-grid">
          <div class="race-section">
          <h4>Previous</h4>
          <div class="race-card-full">
            <div class="race-flag">🇮🇹</div>
            <div class="race-info">
              <p class="round">Round 16</p>
              <h5>Italian Grand Prix</h5>
              <p class="date">05 – 07 SEP</p>
              <p class="location">Monza</p>
            </div>
          </div>
        </div>

        <div class="race-section current-race">
          <h4>Current</h4>
          <div class="race-card-full featured">
            <div class="race-flag">🇦🇿</div>
            <div class="race-info">
              <p class="round">Round 17</p>
              <h5>Azerbaijan Grand Prix</h5>
              <p class="date">19 – 21 SEP</p>
              <p class="location">Baku City Circuit</p>
              <div class="race-status">RACE WEEKEND</div>
            </div>
          </div>
        </div>

        <div class="race-section">
          <h4>Upcoming</h4>
          <div class="race-card-full">
            <div class="race-flag">🇸🇬</div>
            <div class="race-info">
              <p class="round">Round 18</p>
              <h5>Singapore Grand Prix</h5>
              <p class="date">03 – 05 OCT</p>
              <p class="location">Marina Bay</p>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        </li>

        <li><a href="hasil.php">Hasil</a></li>
        <li class="mega-dropdown">
  <a href="#" onclick="return false;">Tim</a>
  <div class="tim-menu">
    <div class="team-container">
      <div class="team-grid">
        <a href="tim.php?id=redbull" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/red-bull-racing-logo.png.transform/2col/image.png" alt="Red Bull Racing">
          <div class="team-info">
            <div class="team-name">Red Bull Racing</div>
            <div class="team-drivers">Verstappen • Tsunoda</div>
          </div>
        </a>
        
        <a href="tim.php?id=mercedes" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/mercedes-logo.png.transform/2col/image.png" alt="Mercedes">
          <div class="team-info">
            <div class="team-name">Mercedes</div>
            <div class="team-drivers">Russell • Antonelli</div>
          </div>
        </a>
        
        <a href="tim.php?id=ferrari" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/ferrari-logo.png.transform/2col/image.png" alt="Ferrari">
          <div class="team-info">
            <div class="team-name">Ferrari</div>
            <div class="team-drivers">Leclerc • Hamilton</div>
          </div>
        </a>
        
        <a href="tim.php?id=mclaren" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/mclaren-logo.png.transform/2col/image.png" alt="McLaren">
          <div class="team-info">
            <div class="team-name">McLaren</div>
            <div class="team-drivers">Norris • Piastri</div>
          </div>
        </a>
        
        <a href="tim.php?id=astonmartin" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/aston-martin-logo.png.transform/2col/image.png" alt="Aston Martin">
          <div class="team-info">
            <div class="team-name">Aston Martin</div>
            <div class="team-drivers">Alonso • Stroll</div>
          </div>
        </a>

        <a href="tim.php?id=alpine" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/alpine-logo.png.transform/2col/image.png" alt="Alpine">
          <div class="team-info">
            <div class="team-name">Alpine</div>
            <div class="team-drivers">Gasly • Colapinto</div>
          </div>
        </a>
        
        <a href="tim.php?id=williams" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/williams-logo.png.transform/2col/image.png" alt="Williams">
          <div class="team-info">
            <div class="team-name">Williams</div>
            <div class="team-drivers">Albon • Sainz</div>
          </div>
        </a>
        
        <a href="tim.php?id=racingbulls" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/racing-bulls-logo.png.transform/2col/image.png" alt="Racing Bulls">
          <div class="team-info">
            <div class="team-name">Racing Bulls</div>
            <div class="team-drivers">Hadjar • Lawson</div>
          </div>
        </a>
        
        <a href="tim.php?id=sauber" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/kick-sauber-logo.png.transform/2col/image.png" alt="Sauber">
          <div class="team-info">
            <div class="team-name">Sauber</div>
            <div class="team-drivers">Hulkenberg • Bortoleto</div>
          </div>
        </a>
        
        <a href="tim.php?id=haas" class="team-card">
          <img src="https://www.formula1.com/content/dam/fom-website/teams/2025/haas-logo.png.transform/2col/image.png" alt="Haas">
          <div class="team-info">
            <div class="team-name">Haas</div>
            <div class="team-drivers">Ocon • Bearman</div>
          </div>
        </a>
      </div>
    </div>
  </div>
</li>
        
        <li class="mega-dropdown">
          <a href="#" onclick="return false;">Pembalap</a>
          <div class="pembalap-menu">
            <div class="driver-container">
              <div class="driver-list">
                <?php foreach ($drivers as $driver_id => $driver): ?>
                <a href="pembalap.php?id=<?= $driver_id; ?>" class="driver-card">
                  <img src="<?= htmlspecialchars($driver['image']); ?>" alt="<?= htmlspecialchars($driver['name']); ?>">
                  <div class="driver-info">
                    <div class="driver-name"><?= htmlspecialchars($driver['name']); ?></div>
                    <div class="team-name"><?= htmlspecialchars($driver['team']); ?></div>
                  </div>
                </a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </li>
        
        <li><a href="klasemen.php">Klasemen</a></li>
        <li><a href="crud_drivers.php">Kelola Data</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="hero">
      <h2>Selamat Datang di F1Pedia</h2>
      <a href="aboutus.php" class="btn">Tentang Kami</a>
    </section>
  </main>

  <footer>
    <p>Referensi: <a href="https://www.formula1.com/">Formula1.com</a></p>
  </footer>
</body>

</html>
