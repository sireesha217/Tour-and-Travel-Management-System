<?php
// ===== Database Connection =====
$servername = "localhost";
$username   = "root";
$password   = "php123";
$dbname     = "traveltour";  // Updated DB name

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages | TravelTour Admin</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    body { padding: 40px; background: #fafafa; }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: #fff;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      border-radius: 10px;
      overflow: hidden;
    }
    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background: #ff6600;
      color: #fff;
    }
    tr:hover { background: #f9f9f9; }
    h1 { margin-bottom: 20px; }
  </style>
</head>
<body>
  <h1>📩 Contact Messages</h1>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Submitted At</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row["id"]; ?></td>
        <td><?= htmlspecialchars($row["name"]); ?></td>
        <td><?= htmlspecialchars($row["email"]); ?></td>
        <td><?= nl2br(htmlspecialchars($row["message"])); ?></td>
        <td><?= $row["submitted_at"]; ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>No messages yet.</p>
  <?php endif; ?>

</body>
</html>
<?php $conn->close(); ?>
