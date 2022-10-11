<?php

class CardCollectionWriterImage implements CardCollectionWriterInterface
{
    public function __construct()
    {
        $this->codes = [
            "spades" => ["&spades;", "black"],
            "diamonds" => ["&diams;", "red"],
            "hearts" => ["&hearts;", "red"],
            "clubs" => ["&clubs;", "black"]
        ];
    }

    public function write(CardCollection $cardCollection): string
    {
        $output = "";
        foreach ($cardCollection as $card) {
            $output .= sprintf("<div><img src=\"cards\%s_of_%s.svg\" alt=\"%s \" /></div>\n", $card->getSymbol(),
                mb_strtolower($card->getSuit()->name), $this->codes[mb_strtolower($card->getSuit()->name)][0]);
        }
        return $output;
    }
}

?>