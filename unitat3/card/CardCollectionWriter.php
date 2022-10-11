<?php
require_once 'CardCollectionWriterInterface.php';

class CardCollectionWriter implements CardCollectionWriterInterface {
    public function write(CardCollection $cardCollection): string {
        $output = "";
        foreach ($cardCollection->getCards() as $card) {
            $output .= sprintf("<div>%s - %s </div>", $card->getSymbol(), $card->getSuit()->name);
        }
        return $output;
    }
}
