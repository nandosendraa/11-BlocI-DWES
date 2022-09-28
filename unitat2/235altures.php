<?php
$persones = array(
    'Pau' => 177,
    'Jose' => 170,
    'Josep' => 174,
    'Edgar' => 183,
    'Molina' => 185
);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>235</title>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Altura</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($persones as $persona => $altura) {
            echo "<tr>";
            echo "<td>" . $persona . "</td>";
            echo "<td>" . $altura . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>



