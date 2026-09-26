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

// SQL statement to insert records
$sql = "INSERT INTO guitar_pedals (Brand, Category, Name, MSRP) VALUES
('Fulltone', 'Wah', 'Clyde', 299.00),
('MXR', 'Fuzz', 'Classic 108 Fuzz', 179.99),
('Peterson', 'Tuner', 'Strobostomp HD', 149.00),
('MXR', 'Compressor', 'Custom Comp', 89.99),
('JHS', 'Overdrive', 'Morning Glory', 199.00),
('Fulltone', 'Overdrive', 'OCD', 176.00),
('TC Electronic', 'Distortion', 'Dark Matter', 62.90),
('Fulltone', 'Distortion', 'PlimSoul', 145.00),
('Source Audio', 'Chorus/Modulation', 'Orbital Modulator', 99.00),
('Source Audio', 'Delay/Reverb', 'Collider', 360.00),
('MXR', 'Delay/Reverb', 'Carbon Copy', 159.99)";

if ($conn->query($sql) === TRUE) {
    echo "Records inserted successfully into 'guitar_pedals'.";
} else {
    echo "Error inserting records: " . $conn->error;
}

$conn->close();
?>