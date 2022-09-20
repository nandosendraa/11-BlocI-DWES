<?php
$suma = 0;
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
    for ($i=1; $i <=10; $i++){
        $suma += $i;
    }
    echo $suma;
    ?>
</p>
</body>
</html>