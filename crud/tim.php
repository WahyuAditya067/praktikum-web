<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Data tim (dalam aplikasi real, ini akan dari database)
$teams = [
    'redbull' => [
        'name' => 'Red Bull Racing',
        'full_name' => 'Oracle Red Bull Racing',
        'base' => 'Milton Keynes, United Kingdom',
        'chassis' => 'RB21',
        'power_unit' => 'Honda RBPT',
        'first_entry' => '2005',
        'world_championships' => '6',
        'pole_positions' => '103',
        'fastest_laps' => '95',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/red-bull-racing-logo.png.transform/2col/image.png',
        'color' => '#0600EF',
        'drivers' => [
            ['name' => 'Max Verstappen', 'number' => '1'],
            ['name' => 'Yuki Tsunoda', 'number' => '22']
        ]
    ],
    'mercedes' => [
        'name' => 'Mercedes',
        'full_name' => 'Mercedes-AMG Petronas F1 Team',
        'base' => 'Brackley, United Kingdom',
        'chassis' => 'W16',
        'power_unit' => 'Mercedes',
        'first_entry' => '1954',
        'world_championships' => '8',
        'pole_positions' => '133',
        'fastest_laps' => '97',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/mercedes-logo.png.transform/2col/image.png',
        'color' => '#00D2BE',
        'drivers' => [
            ['name' => 'George Russell', 'number' => '63'],
            ['name' => 'Kimi Antonelli', 'number' => '12']
        ]
    ],
    'ferrari' => [
        'name' => 'Ferrari',
        'full_name' => 'Scuderia Ferrari',
        'base' => 'Maranello, Italy',
        'chassis' => 'SF-25',
        'power_unit' => 'Ferrari',
        'first_entry' => '1950',
        'world_championships' => '16',
        'pole_positions' => '249',
        'fastest_laps' => '262',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/ferrari-logo.png.transform/2col/image.png',
        'color' => '#DC0000',
        'drivers' => [
            ['name' => 'Charles Leclerc', 'number' => '16'],
            ['name' => 'Lewis Hamilton', 'number' => '44']
        ]
    ],
    'mclaren' => [
        'name' => 'McLaren',
        'full_name' => 'McLaren F1 Team',
        'base' => 'Woking, United Kingdom',
        'chassis' => 'MCL39',
        'power_unit' => 'Mercedes',
        'first_entry' => '1966',
        'world_championships' => '8',
        'pole_positions' => '156',
        'fastest_laps' => '164',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/mclaren-logo.png.transform/2col/image.png',
        'color' => '#FF8700',
        'drivers' => [
            ['name' => 'Lando Norris', 'number' => '4'],
            ['name' => 'Oscar Piastri', 'number' => '81']
        ]
    ],
    'astonmartin' => [
        'name' => 'Aston Martin',
        'full_name' => 'Aston Martin Aramco F1 Team',
        'base' => 'Silverstone, United Kingdom',
        'chassis' => 'AMR25',
        'power_unit' => 'Mercedes',
        'first_entry' => '2021',
        'world_championships' => '0',
        'pole_positions' => '1',
        'fastest_laps' => '1',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/aston-martin-logo.png.transform/2col/image.png',
        'color' => '#006F62',
        'drivers' => [
            ['name' => 'Fernando Alonso', 'number' => '14'],
            ['name' => 'Lance Stroll', 'number' => '18']
        ]
    ],
    'alpine' => [
        'name' => 'Alpine',
        'full_name' => 'BWT Alpine F1 Team',
        'base' => 'Enstone, United Kingdom',
        'chassis' => 'A525',
        'power_unit' => 'Renault',
        'first_entry' => '2021',
        'world_championships' => '2',
        'pole_positions' => '20',
        'fastest_laps' => '16',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/alpine-logo.png.transform/2col/image.png',
        'color' => '#0090FF',
        'drivers' => [
            ['name' => 'Pierre Gasly', 'number' => '10'],
            ['name' => 'Franco Colapinto', 'number' => '43']
        ]
    ],
    'williams' => [
        'name' => 'Williams',
        'full_name' => 'Williams Racing',
        'base' => 'Grove, United Kingdom',
        'chassis' => 'FW47',
        'power_unit' => 'Mercedes',
        'first_entry' => '1978',
        'world_championships' => '9',
        'pole_positions' => '128',
        'fastest_laps' => '133',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/williams-logo.png.transform/2col/image.png',
        'color' => '#005AFF',
        'drivers' => [
            ['name' => 'Alexander Albon', 'number' => '23'],
            ['name' => 'Carlos Sainz', 'number' => '55']
        ]
    ],
    'racingbulls' => [
        'name' => 'Racing Bulls',
        'full_name' => 'Visa Cash App RB F1 Team',
        'base' => 'Faenza, Italy',
        'chassis' => 'VCARB02',
        'power_unit' => 'Honda RBPT',
        'first_entry' => '2006',
        'world_championships' => '0',
        'pole_positions' => '1',
        'fastest_laps' => '2',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/racing-bulls-logo.png.transform/2col/image.png',
        'color' => '#6692FF',
        'drivers' => [
            ['name' => 'Isack Hadjar', 'number' => '6'],
            ['name' => 'Liam Lawson', 'number' => '30']
        ]
    ],
    'sauber' => [
        'name' => 'Sauber',
        'full_name' => 'Stake F1 Team Kick Sauber',
        'base' => 'Hinwil, Switzerland',
        'chassis' => 'C45',
        'power_unit' => 'Ferrari',
        'first_entry' => '1993',
        'world_championships' => '0',
        'pole_positions' => '1',
        'fastest_laps' => '7',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/kick-sauber-logo.png.transform/2col/image.png',
        'color' => '#00E701',
        'drivers' => [
            ['name' => 'Nico Hulkenberg', 'number' => '27'],
            ['name' => 'Gabriel Bortoleto', 'number' => '5']
        ]
    ],
    'haas' => [
        'name' => 'Haas',
        'full_name' => 'MoneyGram Haas F1 Team',
        'base' => 'Kannapolis, United States',
        'chassis' => 'VF-25',
        'power_unit' => 'Ferrari',
        'first_entry' => '2016',
        'world_championships' => '0',
        'pole_positions' => '1',
        'fastest_laps' => '2',
        'logo' => 'https://www.formula1.com/content/dam/fom-website/teams/2025/haas-logo.png.transform/2col/image.png',
        'color' => '#B6BABD',
        'drivers' => [
            ['name' => 'Esteban Ocon', 'number' => '31'],
            ['name' => 'Oliver Bearman', 'number' => '87']
        ]
    ]
];

// Ambil ID tim dari URL
$team_id = isset($_GET['id']) ? $_GET['id'] : '';

// Cek apakah tim ada
if (!isset($teams[$team_id])) {
    header("Location: index.php");
    exit();
}

$team = $teams[$team_id];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($team['name']); ?> - F1Pedia</title>
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
        <li><a href="klasemen.php">Klasemen</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="team-profile">
      <a href="index.php" class="back-button">← Kembali ke Beranda</a>
      
      <div class="team-header">
        <div class="team-logo-section">
          <img src="<?php echo htmlspecialchars($team['logo']); ?>" alt="<?php echo htmlspecialchars($team['name']); ?>" class="team-logo-large">
        </div>
        
        <div class="team-details">
          <h1><?php echo htmlspecialchars($team['full_name']); ?></h1>
          
          <div class="team-info-grid">
            <div class="info-item">
              <div class="info-label">Base</div>
              <div class="info-value"><?php echo htmlspecialchars($team['base']); ?></div>
            </div>
            
            <div class="info-item">
              <div class="info-label">First Entry</div>
              <div class="info-value"><?php echo htmlspecialchars($team['first_entry']); ?></div>
            </div>
            
            <div class="info-item">
              <div class="info-label">Chassis</div>
              <div class="info-value"><?php echo htmlspecialchars($team['chassis']); ?></div>
            </div>
            
            <div class="info-item">
              <div class="info-label">Power Unit</div>
              <div class="info-value"><?php echo htmlspecialchars($team['power_unit']); ?></div>
            </div>
          </div>
        </div>
      </div>

      <div class="stats-container">
        <div class="stat-card">
          <div class="stat-value"><?php echo htmlspecialchars($team['world_championships']); ?></div>
          <div class="stat-label">World Championships</div>
        </div>
        
        <div class="stat-card">
          <div class="stat-value"><?php echo htmlspecialchars($team['pole_positions']); ?></div>
          <div class="stat-label">Pole Positions</div>
        </div>
        
        <div class="stat-card">
          <div class="stat-value"><?php echo htmlspecialchars($team['fastest_laps']); ?></div>
          <div class="stat-label">Fastest Laps</div>
        </div>
      </div>

      <div class="team-drivers-section">
        <h2>Driver</h2>
        <div class="drivers-grid">
          <?php foreach ($team['drivers'] as $driver): ?>
          <div class="driver-item">
            <div class="driver-number-big"><?php echo htmlspecialchars($driver['number']); ?></div>
            <div class="driver-name-big"><?php echo htmlspecialchars($driver['name']); ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <p>Referensi: <a href="https://www.formula1.com/">Formula1.com</a></p>
  </footer>
</body>
</html>