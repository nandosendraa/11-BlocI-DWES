<?php
$edad = $_GET["edad"];
$anysJubilacio = 67 - $edad;
$currentYear = (int)date("Y");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>205</title>
</head>
<body>
    <p>Fa 10 anys tenies <?= $edad - 10?> anys (<?=$currentYear - 10?>) i en 10 anys tindras <?= $edad + 10?> anys (<?=$currentYear + 10?>)</p>
    <p>Falten <?= $anysJubilacio ?> anys per a que et jubiles (<?= $anysJubilacio + $currentYear?>)</p>
</body>
</html>
