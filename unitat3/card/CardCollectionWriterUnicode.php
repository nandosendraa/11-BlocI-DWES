<?php
class CardCollectionWriterUnicode implements CardCollectionWriterInterface {
    public function __construct() {
        $this->codes =[
                "spades"=>["&spades;", "black"],
                "diamonds"=>["&diams;","red"],
                "hearts"=>["&hearts;", "red"],
                "clubs"=>["&clubs;", "black"]
        ];
    }
    public function write(CardCollection $cardCollection): string {
        $output = "";
        foreach ($cardCollection->getCards() as $card) {
            $output .= sprintf("<div>%s <span style=\"color:%s\"> %s</span> </div>", $card->getSymbol(),
                $this->codes[mb_strtolower($card->getSuit()->name)][1], $this->codes[mb_strtolower($card->getSuit()->name)][0]);
        }
        return $output;
    }
}
