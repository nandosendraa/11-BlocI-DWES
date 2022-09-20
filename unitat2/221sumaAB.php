<?php
$suma = 0;
$inici = (int)$_GET["inici"];
$fi = (int)$_GET["fi"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>221</title>
</head>
<body>
<p>
    <?php
    for ($i=$inici; $i <=$fi; $i++){
        $suma += $i;
    }
    echo $suma;
    ?>
</p>
</body>
</html>