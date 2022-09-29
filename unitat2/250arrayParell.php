<?php
function esParell($num){
    if ($num % 2 == 0)
        return true;
}

function arrayAleatori($tam,$min,$max){
    $array = array();
    for ($i=0;$i<$tam;$i++){
        $array[$i] = rand($min, $max);
    }
    return $array;
}
function arrayParells(array $array){
    $parells = 0;
    $arrayParells = $array;
    for ($i=0;$i<count($arrayParells);$i++){
        if ($arrayParells[$i] % 2 ==0){
            $parells ++;
        }
    }
    return $parells;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>250</title>
</head>
<body>
    <?php
        echo arrayParells(arrayAleatori(10,2,10));
    ?>
</body>

</html>