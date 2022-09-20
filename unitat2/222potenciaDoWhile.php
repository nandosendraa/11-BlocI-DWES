<?php
$base = (int)$_GET["base"];
$exponent = (int)$_GET["exponent"];
$potencia = 1;
$i = 1;
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
    do{
        $i++;
        $potencia *= $base;
    }while ($i<=$exponent);
    echo $potencia;
    ?>
</p>
</body>
</html>
