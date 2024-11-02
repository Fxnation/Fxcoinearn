<?php
// Database connection settings
$host = 'localhost';
$dbname = "";  // The database name you just created
$username = 'root';          // Your MySQL username
$password = '';              // Your MySQL password (if any)

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>