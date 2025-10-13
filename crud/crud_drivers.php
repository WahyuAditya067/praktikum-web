<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$sql = "SELECT * FROM drivers";
$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['id'],
            'driver_id' => $row['driver_id'],
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
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Pembalap - F1Pedia</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="crud-style.css">
</head>
<body>
  <header>
    <div class="user-info">
      <p><strong>User:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
      <a href="logout.php" class="btn-logout">Logout</a>
    </div>
    
    <h1>F1Pedia</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="jadwal.php">Jadwal</a></li>
        <li><a href="hasil.php">Hasil</a></li>
        <li><a href="klasemen.php">Klasemen</a></li>
        <li><a href="crud_drivers.php">Kelola Pembalap</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="crud-container">
      <h2>Kelola Data Pembalap</h2>
      <a href="create_driver.php" class="btn-add">+ Tambah Pembalap Baru</a>
      
      <table border="1">
        <tr>
          <th>ID</th>
          <th>Foto</th>
          <th>Driver ID</th>
          <th>Nama</th>
          <th>Nomor</th>
          <th>Tim</th>
          <th>Negara</th>
          <th>Tanggal Lahir</th>
          <th>Podiums</th>
          <th>Points</th>
          <th>Grand Prix</th>
          <th>Championships</th>
          <th>Aksi</th>
        </tr>
        <?php foreach ($data as $driver): ?>
        <tr>
          <td><?= $driver['id']; ?></td>
          <td><img src="<?= $driver['image']; ?>" alt="<?= $driver['name']; ?>" class="driver-img-table"></td>
          <td><?= $driver['driver_id']; ?></td>
          <td><?= $driver['name']; ?></td>
          <td><?= $driver['number']; ?></td>
          <td><?= $driver['team']; ?></td>
          <td><?= $driver['country']; ?></td>
          <td><?= $driver['dob']; ?></td>
          <td><?= $driver['podiums']; ?></td>
          <td><?= $driver['points']; ?></td>
          <td><?= $driver['grands_prix']; ?></td>
          <td><?= $driver['championships']; ?></td>
          <td>
            <a href="update_driver.php?id=<?= $driver['id']; ?>" class="btn-edit">Edit</a> |
            <a href="delete_driver.php?id=<?= $driver['id']; ?>" 
               onclick="return confirm('Yakin ingin menghapus data ini?')" 
               class="btn-delete">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </main>

  <footer>
    <p>Referensi: <a href="https://www.formula1.com/">Formula1.com</a></p>
  </footer>
</body>
</html>