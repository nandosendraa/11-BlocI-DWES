<?php
declare(strict_types=1);
include_once 'Card.php';
include 'CardCollection.php';
$collection = new CardCollection();
$c1 = new Card('spades','A',1);
$c2 = new Card('hearts','9',2);
$c3 = new Card('diamonds','3',3);
$c4 = new Card('clubs','K',4);

$array = [$c1,$c2,$c3,$c4];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
</head>
<body>
<?php
    $collection->add($array);
    $collection->shuffle();
    echo $collection->writer();
?>
</body>

</html>
