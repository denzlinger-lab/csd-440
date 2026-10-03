<?php
// AbramJSON.php - Processes form data and outputs JSON securely.

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect and sanitize the 8+ fields of data
    $formData = [
        "First Name"              => htmlspecialchars(trim($_POST['firstName'] ?? '')),
        "Last Name"               => htmlspecialchars(trim($_POST['lastName'] ?? '')),
        "Email"                   => htmlspecialchars(trim($_POST['email'] ?? '')),
        "Phone"                   => htmlspecialchars(trim($_POST['phone'] ?? '')),
        "Age"                     => htmlspecialchars(trim($_POST['age'] ?? '')),
        "Occupation"              => htmlspecialchars(trim($_POST['occupation'] ?? '')),
        "Preferred Contact Method"=> htmlspecialchars(trim($_POST['contactMethod'] ?? '')),
        "Bio/Comments"            => htmlspecialchars(trim($_POST['bio'] ?? ''))
    ];

    // Validate that no fields are empty
    $hasError = false;
    foreach ($formData as $key => $value) {
        if (empty($value)) {
            $hasError = true;
            break;
        }
    }

    if ($hasError) {
        // Error display if validation fails
        outputError("All form fields are required. Please go back and fill out the form completely.");
    } else {
        // Encode data into JSON format with pretty print for readability
        $jsonData = json_encode($formData, JSON_PRETTY_PRINT);

        if ($jsonData === false) {
            outputError("Failed to encode data into JSON format.");
        } else {
            // Well-formatted output display
            outputSuccess($jsonData);
        }
    }
} else {
    // Error display if accessed directly without submission
    outputError("Invalid request method. Please submit the form first.");
}

/**
 * Renders a well-formatted success display containing the JSON.
 */
function outputSuccess($json) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Submission Success - JSON Output</title>
        <style>
            body { font-family: Arial, sans-serif; background-color: #eef2f3; padding: 40px; }
            .container { max-width: 700px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
            h2 { color: #28a745; margin-top: 0; }
            pre { background: #272822; color: #f8f8f2; padding: 20px; border-radius: 6px; overflow-x: auto; font-size: 14px; }
            .back-link { display: inline-block; margin-top: 20px; text-decoration: none; color: #007BFF; font-weight: bold; }
            .back-link:hover { text-decoration: underline; }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Success! Data Encoded to JSON</h2>
            <p>Your submission was successfully processed and transformed into the following JSON structure:</p>
            <pre><?php echo $json; ?></pre>
            <a class="back-link" href="AbramForm.html">&larr; Back to Form</a>
        </div>
    </body>
    </html>
    <?php
}

/**
 * Renders a well-formatted error display.
 */
function outputError($message) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Submission Error</title>
        <style>
            body { font-family: Arial, sans-serif; background-color: #fcf0f0; padding: 40px; }
            .container { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-left: 6px solid #dc3545; }
            h2 { color: #dc3545; margin-top: 0; }
            p { color: #333; font-size: 16px; }
            .back-link { display: inline-block; margin-top: 20px; text-decoration: none; color: #dc3545; font-weight: bold; }
            .back-link:hover { text-decoration: underline; }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Error Encountered</h2>
            <p><?php echo $message; ?></p>
            <a class="back-link" href="AbramForm.html">&larr; Try Again</a>
        </div>
    </body>
    </html>
    <?php
}
?>