<?php
/**
 * Abram Denzlinger
 * August 23, 2026
 * CSD440 - Assignment 3.2
 * 
 * Demonstrates the use of an external function file to compute 
 * the sum of two random numbers inside a nested loop table structure.
 */

// Include the external file containing the custom function
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AbramTable3</title>
    <style>
        /* Table structural styling */
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        
        /* Cell border and alignment styling */
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Render the dynamic HTML grid using the external function -->
    <table>
        <?php 
        // Outer loop controls table rows
        for ($i = 0; $i < 5; $i++): 
        ?>
            <tr>
                <?php 
                // Inner loop controls table cells per row
                for ($j = 0; $j < 5; $j++): 
                    // Generate two pseudo-random numbers
                    $rand1 = rand(1, 50);
                    $rand2 = rand(1, 50);
                    
                    // Call the external function to get the sum
                    $sum = calculateSum($rand1, $rand2);
                ?>
                    <!-- Output the calculated sum inside the cell -->
                    <td><?php echo $sum; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>
</html>