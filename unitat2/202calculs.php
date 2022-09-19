<?php

$x = 166;
$y = 999;

$product = $x * $y;
$sum = $x + $y;
$division =  $x / $y;
$subtraction =  $x - $y;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>202</title>
</head>
<body>
<p><?= $x ?> + <?= $x ?> = <?= $sum ?></p>
<p><?= $x ?> - <?= $x ?> = <?= $subtraction ?></p>
<p><?= $x ?> * <?= $x ?> = <?= $product ?></p>
<p><?= $x ?> / <?= $x ?> = <?= $division ?></p>
</body>
</html>
