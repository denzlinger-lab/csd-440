<?php
/**
 * Abram Denzlinger
 * August 23, 2026
 * CSD440 - Assignment 2.2 - AbramTable2.php
 * 
 * Demonstrates the use of PHP nested loop structures to dynamically 
 * generate a 5x5 two-dimensional table filled with random numbers.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AbramTable2</title>
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

    <!-- Render the dynamic HTML grid -->
    <table>
        <?php 
        // Outer loop controls the creation of table rows (TR)
        for ($i = 0; $i < 5; $i++): 
        ?>
            <tr>
                <?php 
                // Inner loop controls the creation of cells (TD) within each row
                for ($j = 0; $j < 5; $j++): 
                ?>
                    <!-- Output a pseudo-random integer between 1 and 100 -->
                    <td><?php echo rand(1, 100); ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>
</html>