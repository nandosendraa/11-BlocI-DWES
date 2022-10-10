<?php

// https://php.watch/versions/8.1/enums
require "Card.php";
require "CardCollection.php";
require "CardCollectionWriter.php";
require "CardCollectionWriterUnicode.php";
require "CardCollectionWriterImage.php";
require "CardsGame.php";

$writer = rand(1, 3);

$writer = new CardCollectionWriterUnicode();

$game = new CardsGame($writer);

$game->setup();

$output = $game->execute();

extract($output);

require "index.view.php";
