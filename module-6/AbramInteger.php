<!-- 
Abram Denzlinger
September 5, 2026
CSD440 - Module 6 Assignment

This program defines a class called AbramMyInteger that encapsulates 
an integer value and provides methods to check if the integer is even, 
odd, or prime. The program also includes a test script that creates 
two instances of the class and demonstrates the functionality of its 
methods. 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbramMyInteger Test Program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #333;
            line-height: 1.6;
        }
        h1, h2 {
            color: #0056b3;
        }
        .card {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-left: 5px solid #0056b3;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 4px 0;
        }
    </style>
</head>
<body>

    <h1>AbramMyInteger Class Demo</h1>

    <?php
    class AbramMyInteger {
        private int $value;

        // Constructor to set the single integer parameter
        public function __construct(int $value) {
            $this->value = $value;
        }

        // Getter method
        public function getValue(): int {
            return $this->value;
        }

        // Setter method
        public function setValue(int $value): void {
            $this->value = $value;
        }

        // Method to check if a passed integer parameter is even
        public function isEven(int $num): bool {
            return $num % 2 === 0;
        }

        // Method to check if a passed integer parameter is odd
        public function isOdd(int $num): bool {
            return $num % 2 !== 0;
        }

        // Method to check if the class's stored instance value is prime
        public function isPrime(): bool {
            if ($this->value <= 1) {
                return false;
            }
            for ($i = 2; $i <= sqrt($this->value); $i++) {
                if ($this->value % $i === 0) {
                    return false;
                }
            }
            return true;
        }
    }

    // --- Testing Instance 1 ---
    echo "<div class='card'>";
    echo "<h2>Instance 1 Testing</h2>";
    $intObj1 = new AbramMyInteger(7); // Stored value is 7
    
    echo "<ul>";
    echo "<li>Stored Value (via Getter): <strong>" . $intObj1->getValue() . "</strong></li>";
    echo "<li>isEven(4) [testing parameter 4]: <strong>" . ($intObj1->isEven(4) ? 'True' : 'False') . "</strong></li>";
    echo "<li>isOdd(4) [testing parameter 4]: <strong>" . ($intObj1->isOdd(4) ? 'True' : 'False') . "</strong></li>";
    echo "<li>isPrime() [checking stored value 7]: <strong>" . ($intObj1->isPrime() ? 'True' : 'False') . "</strong></li>";

    // Test Setter update
    $intObj1->setValue(15);
    echo "<li>Updated Stored Value (via Setter): <strong>" . $intObj1->getValue() . "</strong></li>";
    echo "<li>isPrime() [checking updated stored value 15]: <strong>" . ($intObj1->isPrime() ? 'True' : 'False') . "</strong></li>";
    echo "</ul>";
    echo "</div>";

    // --- Testing Instance 2 ---
    echo "<div class='card'>";
    echo "<h2>Instance 2 Testing</h2>";
    $intObj2 = new AbramMyInteger(23); // Stored value is 23

    echo "<ul>";
    echo "<li>Stored Value (via Getter): <strong>" . $intObj2->getValue() . "</strong></li>";
    echo "<li>isEven(10) [testing parameter 10]: <strong>" . ($intObj2->isEven(10) ? 'True' : 'False') . "</strong></li>";
    echo "<li>isOdd(10) [testing parameter 10]: <strong>" . ($intObj2->isOdd(10) ? 'True' : 'False') . "</strong></li>";
    echo "<li>isPrime() [checking stored value 23]: <strong>" . ($intObj2->isPrime() ? 'True' : 'False') . "</strong></li>";

    // Test Setter update
    $intObj2->setValue(8);
    echo "<li>Updated Stored Value (via Setter): <strong>" . $intObj2->getValue() . "</strong></li>";
    echo "<li>isPrime() [checking updated stored value 8]: <strong>" . ($intObj2->isPrime() ? 'True' : 'False') . "</strong></li>";
    echo "</ul>";
    echo "</div>";
    ?>

</body>
</html>