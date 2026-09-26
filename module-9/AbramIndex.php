<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Baseball 01 - Guitar Pedals Home</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; margin: 0; padding: 40px; color: #333; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align: center; }
        h1 { color: #2c3e50; }
        p { color: #666; margin-bottom: 30px; }
        .menu-links { display: flex; flex-direction: column; gap: 15px; }
        .menu-links a { display: block; background: #3498db; color: white; padding: 12px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: background 0.3s; }
        .menu-links a:hover { background: #2980b9; }
        .menu-links a.danger { background: #e74c3c; }
        .menu-links a.danger:hover { background: #c0392b; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Guitar Pedals Database</h1>
        <p>Welcome to the CSD440 project interface for the <strong>baseball_01</strong> database.</p>
        <div class="menu-links">
            <a href="AbramCreateTable.php">Create Table</a>
            <a href="AbramPopulateTable.php">Populate Table</a>
            <a href="AbramForm.php">Add New Record</a>
            <a href="AbramQueryTable.php">View All Records</a>
            <a href="AbramQuery.php">Search/Query Records</a>
            <a href="AbramDropTable.php" class="danger">Drop Table</a>
        </div>
    </div>
</body>
</html>