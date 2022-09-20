<?php
$base = (int)$_GET["base"];
$exponent = (int)$_GET["exponent"];
$potencia = 1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>222</title>
</head>
<body>
<p>
    <?php
    for ($i=1; $i <=$exponent; $i++){
        $potencia *= $base;
    }
    echo $potencia;
    ?>
</p>
</body>
</html>