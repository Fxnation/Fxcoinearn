<?php
// Include the database connection file
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $uidNumber = $_POST['uidNumber'];
    $walletAddress = $_POST['walletAddress'];
    $coinBalance = $_POST['coinBalance'];
    $exchange = $_POST['exchange'];

    // Simple validation
    if (!empty($uidNumber) && !empty($walletAddress) && !empty($coinBalance) && !empty($exchange)) {
        try {
            // Prepare an SQL statement to insert the data
            $stmt = $pdo->prepare("INSERT INTO users (uidNumber, walletAddress, coinBalance, exchange) VALUES (:uidNumber, :walletAddress, :coinBalance, :exchange)");

            // Bind parameters
            $stmt->bindParam(':uidNumber', $uidNumber);
            $stmt->bindParam(':walletAddress', $walletAddress);
            $stmt->bindParam(':coinBalance', $coinBalance);
            $stmt->bindParam(':exchange', $exchange);

            // Execute the statement
            $stmt->execute();

            // Confirm insertion to the user
            echo "<h2>User Details</h2>";
            echo "UID Number: " . htmlspecialchars($uidNumber) . "<br>";
            echo "Wallet Address: " . htmlspecialchars($walletAddress) . "<br>";
            echo "Coin Balance: " . htmlspecialchars($coinBalance) . "<br>";
            echo "Selected Exchange: " . htmlspecialchars($exchange) . "<br>";
            echo "<p>Data successfully saved to the database.</p>";
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "All fields are required!";
    }
}
?>