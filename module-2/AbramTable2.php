<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AbramTable2</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <table>
        <?php for ($i = 0; $i < 5; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 5; $j++): ?>
                    <td><?php echo rand(1, 100); ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>
</html>