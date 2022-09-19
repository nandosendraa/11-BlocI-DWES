<?php
$nom = $_GET["nom"];
$cognom1 = $_GET["cognom1"];
$cognom2 = $_GET["cognom2"];
$email = $_GET["email"];
$data = $_GET["data"];
$telefon = $_GET["telefono"];
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