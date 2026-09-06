<!-- 
Abram Denzlinger
September 5, 2026
CSD440 - Module 5 - PHP Arrays and Array Methods

This program creates an array of 10 customers, each with a first name, last name, 
age, and phone number. It then uses PHP array methods to filter the customers 
based on specific criteria and displays the results in a user-friendly format. 
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abram Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
            color: #333;
        }
        h1, h2 {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #343a40;
            color: #ffffff;
        }
        tr:hover {
            background-color: #f1f3f5;
        }
        .section {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>

    <h1>Abram Customer Directory</h1>

    <?php
    // 1. Create an array of 10 customers with first name, last name, age, and phone number
    $customers = [
        ["firstName" => "Alice",   "lastName" => "Smith",    "age" => 28, "phone" => "555-0101"],
        ["firstName" => "Bob",     "lastName" => "Johnson",  "age" => 34, "phone" => "555-0202"],
        ["firstName" => "Charlie", "lastName" => "Williams", "age" => 42, "phone" => "555-0303"],
        ["firstName" => "Diana",   "lastName" => "Brown",    "age" => 23, "phone" => "555-0404"],
        ["firstName" => "Ethan",   "lastName" => "Jones",    "age" => 51, "phone" => "555-0505"],
        ["firstName" => "Fiona",   "lastName" => "Garcia",   "age" => 37, "phone" => "555-0606"],
        ["firstName" => "George",  "lastName" => "Miller",   "age" => 29, "phone" => "555-0707"],
        ["firstName" => "Hannah",  "lastName" => "Davis",    "age" => 45, "phone" => "555-0808"],
        ["firstName" => "Ian",     "lastName" => "Rodriguez","age" => 31, "phone" => "555-0909"],
        ["firstName" => "Julia",   "lastName" => "Smith",    "age" => 26, "phone" => "555-1010"]
    ];

    /**
     * Helper function to render a customer table
     */
    function renderTable($data) {
        if (empty($data)) {
            echo "<p>No customer records found.</p>";
            return;
        }
        echo "<table>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone Number</th></tr>";
        foreach ($data as $customer) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($customer['firstName']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['lastName']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['age']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['phone']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>

    <!-- Display All Customers -->
    <div class="section">
        <h2>All Customers</h2>
        <?php renderTable($customers); ?>
    </div>

    <?php
    
    // 2. Using array methods: Find customers whose age is greater than 35
    $olderCustomers = array_filter($customers, function($customer) {
        return $customer['age'] > 35;
    });

    // 3. Using array methods: Find customers with the last name 'Smith'
    $smithCustomers = array_filter($customers, function($customer) {
        return $customer['lastName'] === 'Smith';
    });
    ?>

    <!-- Display Filtered Results: Age > 35 -->
    <div class="section">
        <h2>Filtered Results: Customers Older than 35</h2>
        <?php renderTable($olderCustomers); ?>
    </div>

    <!-- Display Filtered Results: Last Name = 'Smith' -->
    <div class="section">
        <h2>Filtered Results: Customers with Last Name "Smith"</h2>
        <?php renderTable($smithCustomers); ?>
    </div>

</body>
</html>