<?php
$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

// Create connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statement to drop table
$sql = "DROP TABLE IF EXISTS guitar_pedals";

if ($conn->query($sql) === TRUE) {
    echo "Table 'guitar_pedals' dropped successfully.";
} else {
    echo "Error dropping table: " . $conn->error;
}

$conn->close();
?>