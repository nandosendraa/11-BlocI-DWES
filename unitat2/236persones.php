<?php
$persones = array(
    [
        'nom' => 'Pau',
        'altura' => 177,
        'email' => 'pau@correu.com'
    ],
    [
        'nom' => 'Jose',
        'altura' => 170,
        'email' => 'jose@correu.com'
    ],
    [
        'nom' => 'Josep',
        'altura' => 174,
        'email' => 'josep@correu.com'
    ],
    [
        'nom' => 'Edgar',
        'altura' => 183,
        'email' => 'edgar@correu.com'
    ],
    [
        'nom' => 'Molina',
        'altura' => 185,
        'email' => 'molina@correu.com'
    ]
);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>236</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Altura</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($persones as $persona ) {
    ?>
        <tr>
            <td><?= $persona['nom']?></td>
            <td><?= $persona['altura']?></td>
            <td><?= $persona['email']?></td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
</body>
</html>