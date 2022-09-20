<?php
$a = (int)$_GET["a"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>223</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>a</th>
            <th>*</th>
            <th>b</th>
            <th>=</th>
            <th>a*b</th>
        </tr>
    </thead>
    <tbody>
    <?php
        for ($b=1; $b<=10; $b++){
            echo "<tr>";
                echo "<td>".$a."</td>";
                echo "<td>*</td>";
                echo "<td>".$b."</td>";
                echo "<td>=</td>";
                echo "<td>".$a*$b."</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>
</body>
</html>