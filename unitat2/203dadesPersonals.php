<?php
$nom = "Nando";
$cognom1 = "Sendra";
$cognom2 = "Ortolà";
$email = "nandet2003@gmail.com";
$data = "18/12/2003";
$telefon = 634277210;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>203</title>
    <style>
        td{
            border-collapse:collapse;
            border-spacing:0;
            border-color:black;
            border-style:solid;
            border-width:1px;
            padding: 20px;
        }
        th{
            border-collapse:collapse;
            border-spacing:0;
            border-color:black;
            border-style:solid;
            border-width:1px;
            padding: 20px;
        }
        table{
            border-collapse:collapse;
            border-spacing:0;
            border-color:black;
            border-style:solid;
            border-width:1px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Nom</th>
        <td><?= $nom ?></td>
    </tr>
    <tr>
        <th>Cognom</th>
        <td><?= $cognom1 ?> <?= $cognom2 ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= $email ?></td>
    </tr>
    <tr>
        <th>Fecha Naixement</th>
        <td><?= $data ?></td>
    </tr>
    <tr>
        <th>Telèfon</th>
        <td><?= $telefon ?></td>
    </tr>
</table>
</body>
</html>