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

// Query to select all records
$sql = "SELECT PrimaryKey, Brand, Category, Name, MSRP FROM guitar_pedals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Guitar Pedals Inventory</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>ID</th><th>Brand</th><th>Category</th><th>Name</th><th>MSRP</th></tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["PrimaryKey"] . "</td>";
        echo "<td>" . $row["Brand"] . "</td>";
        echo "<td>" . $row["Category"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>$" . number_format($row["MSRP"], 2) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results found.";
}

$conn->close();
?>