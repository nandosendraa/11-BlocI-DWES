<?php
require_once 'CardCollectionWriterInterface.php';

class CardCollectionWriter implements CardCollectionWriterInterface {
    public function write(CardCollection $cardCollection) {
        foreach ($cardCollection->getCards() as $card) {
            echo sprintf("<div>%s - %s </div>", $card->getSymbol(), $card->getSuit()->name);
        }
    }
}
?>