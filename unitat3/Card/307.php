<?php
declare(strict_types=1);
include 'Card.php';
$c1 = new Card('suit1','symbol1','1');
$c2 = new Card('suit2','symbol2','2');
$c3 = new Card('suit3','symbol3','3');
$c4 = new Card('suit4','symbol4','4');
$c5 = new Card('suit5','symbol5','5');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>307</title>
</head>
<body>
<?php
    $arrayCards=[$c1,$c2,$c3,$c4,$c5];
    for ($i = 0; $i<count($arrayCards); $i++){
        echo $arrayCards[rand(0,4)]->listCard();
        echo "<br>";
    }
?>
</body>

</html>
