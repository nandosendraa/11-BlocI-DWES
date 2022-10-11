<?php

// https://php.watch/versions/8.1/enums
require "Card.php";
require "CardCollection.php";
require "CardCollectionWriter.php";
require "CardCollectionWriterUnicode.php";
require "CardCollectionWriterImage.php";
require "CardsGame.php";
require "Suit.php";

// $writer = new CardCollectionWriterUnicode();
// $writer = new CardCollectionWriter();
 $writer = new CardCollectionWriterImage();


$game = new CardsGame($writer);
$game->setup();
$game->start();

$output = $game->render();

// extract converteix cada clau de l'array en un variable que conté el seu valor
// per exemple extract(["hola"=>1]) generaria la variable $hola = 1

extract($output);

$results = $game->play();

$result = array_sum($results);

require "index.view.php";
