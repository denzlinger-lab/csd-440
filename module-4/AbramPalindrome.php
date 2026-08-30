<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AbramPalindrome</title>
</head>
<body>

    <h2>Palindrome Test Program</h2>
    <p>This program checks if a string is a palindrome using a custom function.</p>

    <?php
    /**
     * Function to test if a string is a palindrome.
     */
    function checkPalindrome($string) {
        // Clean the string (lowercase, remove spaces and punctuation)
        $cleaned = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $string));
        $reversed = strrev($cleaned);
        
        return [
            "original" => $string,
            "forward" => $cleaned,
            "reversed" => $reversed,
            "is_palindrome" => ($cleaned === $reversed)
        ];
    }

    // Six test examples: 3 palindromes and 3 non-palindromes
    $examples = [
        "Racecar",
        "A man, a plan, a canal: Panama",
        "Madam",
        "Professor Ostrowski",
        "PHP Coding",
        "Bellevue University"
    ];
    ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Original String</th>
            <th>Forward (Cleaned)</th>
            <th>Reversed</th>
            <th>Is Palindrome?</th>
        </tr>

        <?php
        foreach ($examples as $item) {
            $result = checkPalindrome($item);
            $status = $result["is_palindrome"] ? "Yes" : "No";

            echo "<tr>";
            echo "<td>" . htmlspecialchars($result["original"]) . "</td>";
            echo "<td>" . htmlspecialchars($result["forward"]) . "</td>";
            echo "<td>" . htmlspecialchars($result["reversed"]) . "</td>";
            echo "<td>" . $status . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>