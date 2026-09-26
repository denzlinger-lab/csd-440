<?php
$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = "";
$result = null;
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string(trim($_GET['search']));
    $sql = "SELECT PrimaryKey, Brand, Category, Name, MSRP FROM guitar_pedals 
            WHERE Brand LIKE '%$search%' OR Category LIKE '%$search%' OR Name LIKE '%$search%'";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Guitar Pedals</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; margin: 0; padding: 40px; color: #333; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; }
        form { text-align: center; margin-bottom: 30px; }
        input[type="text"] { padding: 10px; width: 60%; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { padding: 10px 20px; background: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        input[type="submit"]:hover { background: #2980b9; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #2c3e50; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .back-link { display: block; text-align: center; margin-top: 25px; text-decoration: none; color: #3498db; font-weight: bold; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Guitar Pedals</h1>
        <form method="GET" action="AbramQuery.php">
            <input type="text" name="search" placeholder="Search by Brand, Category, or Name..." value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Search">
        </form>

        <?php if (isset($result)): ?>
            <?php if ($result->num_rows > 0): ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>MSRP</th>
                    </tr>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["PrimaryKey"]; ?></td>
                            <td><?php echo htmlspecialchars($row["Brand"]); ?></td>
                            <td><?php echo htmlspecialchars($row["Category"]); ?></td>
                            <td><?php echo htmlspecialchars($row["Name"]); ?></td>
                            <td>$<?php echo number_format($row["MSRP"], 2); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p style="text-align: center; color: #e74c3c;">No guitar pedals found matching your query.</p>
            <?php endif; ?>
        <?php endif; ?>

        <a class="back-link" href="AbramIndex.php">&larr; Return to Home Menu</a>
    </div>
</body>
</html>
<?php $conn->close(); ?>