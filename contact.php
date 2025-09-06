<?php
// ===== Database Connection Settings =====
$servername = "localhost";
$username   = "root";       // your MySQL username
$password   = "php123";     // your MySQL password
$dbname     = "traveltour"; // your database name

// ===== Connect to MySQL =====
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ===== Handle Form Submission =====
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message)) {
        // Insert into correct table
        $stmt = $conn->prepare("INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<h2>✅ Thank you, $name! Your message has been sent successfully.</h2>";
            echo "<a href='../contact.html'>Go Back</a>";
        } else {
            echo "<h2>❌ Error: " . $stmt->error . "</h2>";
        }

        $stmt->close();
    } else {
        echo "<h2>⚠️ Please fill in all fields.</h2>";
    }
}

$conn->close();
?>
