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

// SQL statement to create table
$sql = "CREATE TABLE IF NOT EXISTS guitar_pedals (
    PrimaryKey INT AUTO_INCREMENT PRIMARY KEY,
    Brand VARCHAR(100) NOT NULL,
    Category VARCHAR(100) NOT NULL,
    Name VARCHAR(100) NOT NULL,
    MSRP DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'guitar_pedals' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>