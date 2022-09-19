<?php
$numero = (int)$_GET["numero"];
    if ($numero > 0)
        echo $numero." es positiu";
    elseif ($numero < 0)
        echo $numero." es negatiu";
    elseif ($numero == 0)
        echo "El numero escollit es 0";
?>
