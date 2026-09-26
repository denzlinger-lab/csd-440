<?php
$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = trim($_POST['brand']);
    $category = trim($_POST['category']);
    $name = trim($_POST['name']);
    $msrp = trim($_POST['msrp']);

    if (!empty($brand) && !empty($category) && !empty($name) && is_numeric($msrp)) {
        $stmt = $conn->prepare("INSERT INTO guitar_pedals (Brand, Category, Name, MSRP) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssd", $brand, $category, $name, $msrp);
        
        if ($stmt->execute()) {
            $message = "<p class='success'>New guitar pedal added successfully!</p>";
        } else {
            $message = "<p class='error'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        $message = "<p class='error'>Please fill in all fields correctly with a valid numeric MSRP.</p>";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Guitar Pedal</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; margin: 0; padding: 40px; color: #333; }
        .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { width: 100%; padding: 12px; background: #27ae60; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 16px; margin-top: 10px; }
        input[type="submit"]:hover { background: #219653; }
        .success { color: #27ae60; text-align: center; font-weight: bold; }
        .error { color: #e74c3c; text-align: center; font-weight: bold; }
        .back-link { display: block; text-align: center; margin-top: 20px; text-decoration: none; color: #3498db; font-weight: bold; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Guitar Pedal</h1>
        <?php echo $message; ?>
        <form method="POST" action="AbramForm.php">
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" id="brand" name="brand" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="msrp">MSRP ($):</label>
                <input type="number" step="0.01" id="msrp" name="msrp" required>
            </div>
            <input type="submit" value="Add Pedal">
        </form>
        <a class="back-link" href="AbramIndex.php">&larr; Return to Home Menu</a>
    </div>
</body>
</html>