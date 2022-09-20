<?php
$edad = (int)$_GET["edad"];

if ($edad < 3)
    echo "Nadó";
elseif ($edad > 3 && $edad < 12)
    echo "Nen";
elseif ($edad > 12 && $edad < 17)
    echo "Adolescent";
elseif ($edad > 18 && $edad < 66)
    echo "Adult";
elseif ($edad > 67)
    echo "Jubilat";
?>