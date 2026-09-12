<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Results</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .card { background: #ffffff; max-width: 600px; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        .error { color: #d9534f; background: #f2dede; padding: 15px; border-radius: 4px; border: 1px solid #ebccd1; }
        .success { color: #2b542c; background: #dff0d8; padding: 15px; border-radius: 4px; border: 1px solid #d6e9c6; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background-color: #007BFF; color: white; }
        .back-btn { display: inline-block; margin-top: 20px; padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; }
        .back-btn:hover { background: #5a6268; }
    </style>
</head>
<body>

<div class="card">
<?php
// Initialize error container
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and trim inputs safely
    $fullname  = trim($_POST['fullname'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $age       = trim($_POST['age'] ?? '');
    $zipcode   = trim($_POST['zipcode'] ?? '');
    $birthdate = trim($_POST['birthdate'] ?? '');
    $city      = trim($_POST['city'] ?? '');
    $tier      = trim($_POST['tier'] ?? '');

    // 1. Verify all fields are populated
    if (empty($fullname) || empty($email) || empty($age) || empty($zipcode) || empty($birthdate) || empty($city) || empty($tier)) {
        $errors[] = "All fields are required. Please go back and fill out the missing information.";
    }

    // 2. Validate Email Format
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format provided.";
    }

    // 3. Validate Numeric Age Range
    if (!empty($age) && (!is_numeric($age) || $age < 1 || $age > 120)) {
        $errors[] = "Age must be a valid number between 1 and 120.";
    }

    // 4. Validate Numeric Zip Code (5 digits)
    if (!empty($zipcode) && (!is_numeric($zipcode) || strlen($zipcode) !== 5)) {
        $errors[] = "Zip code must be a valid 5-digit number.";
    }

    // 5. Validate Date Format (YYYY-MM-DD)
    if (!empty($birthdate)) {
        $d = DateTime::createFromFormat('Y-m-d', $birthdate);
        if (!$d || $d->format('Y-m-d') !== $birthdate) {
            $errors[] = "Invalid birth date format entered.";
        }
    }

    // Output Handling
    if (!empty($errors)) {
        echo "<h2>Submission Error</h2>";
        echo "<div class='error'><ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul></div>";
        echo "<a href='AbramForm.html' class='back-btn'>Return to Form</a>";
    } else {
        echo "<h2>Registration Successful!</h2>";
        echo "<div class='success'>Thank you, <strong>" . htmlspecialchars($fullname) . "</strong>. Your data has been successfully verified and recorded.</div>";
        
        echo "<table>";
        echo "<tr><th>Field Name</th><th>Submitted Data</th></tr>";
        echo "<tr><td>Full Name</td><td>" . htmlspecialchars($fullname) . "</td></tr>";
        echo "<tr><td>Email Address</td><td>" . htmlspecialchars($email) . "</td></tr>";
        echo "<tr><td>Age</td><td>" . htmlspecialchars($age) . "</td></tr>";
        echo "<tr><td>Zip Code</td><td>" . htmlspecialchars($zipcode) . "</td></tr>";
        echo "<tr><td>Birth Date</td><td>" . htmlspecialchars($birthdate) . "</td></tr>";
        echo "<tr><td>City</td><td>" . htmlspecialchars($city) . "</td></tr>";
        echo "<tr><td>Membership Tier</td><td>" . htmlspecialchars($tier) . "</td></tr>";
        echo "</table>";
        
        echo "<a href='AbramForm.html' class='back-btn'>Submit Another Response</a>";
    }
} else {
    echo "<h2>Access Denied</h2>";
    echo "<div class='error'>This script must be accessed via form submission.</div>";
    echo "<a href='AbramForm.html' class='back-btn'>Go to Form</a>";
}
?>
</div>

</body>
</html>