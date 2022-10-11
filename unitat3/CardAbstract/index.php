<?php

require "Card.php";
require "CardCollection.php";
require "Deck.php";
require "Hand.php";
require "Suit.php";


$deck = new Deck();
$hand1 = new Hand();
$hand2 = new Hand();

$numberOfCards = 5;
$deck = setup($deck);
$deck->shuffle();
$hand1->add($deck->deal($numberOfCards));
$hand2->add($deck->deal($numberOfCards));

$deckOutput = write($deck);
$cardsPlayer1 = write($hand1);
$cardsPlayer2 = write($hand2);

function setup(Deck $deck): Deck{
    $symbols = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    $values = [14, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
    foreach (Suit::cases() as $suit) {
        foreach ($symbols as $key => $symbol) {
            $deck->addCard(new Card($suit, $symbol, $values[$key]));
        }
    }
    return $deck;
}

function write(CardCollection $cardCollection): string {
    $output = "";
    foreach ($cardCollection->getCards() as $card) {
        $output .= sprintf("<div>%s - %s </div>", $card->getSymbol(), $card->getSuit()->name);
    }
    return $output;
}

function play(Hand $hand1,Hand $hand2): array
{
    $results = [];
    while (count($hand1->getCards()) > 0) {
        $card1 = $hand1->play();
        $card2 = $hand2->play();

        $results[] = $card1->getValue() <=> $card2->getValue();
    }
    return $results;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cards Game</title>
    <style>
        div.flex {
            display: flex;
            flex-wrap: wrap;
        }

        div.flex > div {
            flex: 0 0 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Baralla Sencera</h1>
    <div class="flex">
        <?php
            echo "<p>".$deckOutput."</p>";
        ?>
    </div>
    <h1>Cartes Jugador 1</h1>
    <div class="flex">
        <?php
        echo "<p>".$cardsPlayer1."</p>";
        ?>
    </div>
    <h1>Cartes Jugador 2</h1>
    <div class="flex">
        <?php
        echo "<p>".$cardsPlayer2."</p>";
        ?>
    </div>
    <div class="flex">
        <?php
            foreach (play($hand1,$hand2) as $match){
                if ($match == 0){
                    echo " EMPAT ";
                }
                else if ($match >0) {
                    echo " Guanya J1 ";
                }
                else
                    echo " Guanya J2 ";

            }
        ?>
    </div>
    <div class="flex">
        <?php
        if (array_sum(play($hand1,$hand2))==0) {
            echo "Empat";
        }
        else if (array_sum(play($hand1,$hand2))>1) {
            echo "El jugador 1 guamya la partida";
        }
        else
            echo "El jugador 2 guamya la partida";
        ?>
    </div>
</body>
</html>