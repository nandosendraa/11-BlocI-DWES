<?php
declare(strict_types=1);
class CardCollection{
    private array $cards;

    public function add(array $cards):void{
        $this->cards=$cards;
    }
    public function addCard(Card $card):void{
        $this->cards[]= $card;
    }
    public function shuffle():void{
        shuffle($this->cards);
    }
    public function getCards():array{
        return $this->cards;
    }
    public function writer(): string{
        $writed="";
        foreach ($this->cards as $card){
            $writed .= "<div>".$card->getSuit()." ".$card->getSymbol()."</div>";
        }
        return $writed;
    }
}