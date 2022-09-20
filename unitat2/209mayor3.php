<?php
$a = (int)$_GET["a"];
$b = (int)$_GET["b"];
$c = (int)$_GET["c"];

    if ($a > $b && $a > $c)
        echo $a." es major que ".$b." i que ".$c;
    elseif ($b > $a && $b > $c)
        echo $b." es major que ".$a." i que ".$c;
    elseif ($c > $a && $c > $b)
        echo $c." es major que ".$a." i que ".$b;
?>