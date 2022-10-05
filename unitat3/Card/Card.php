<?php
declare(strict_types=1);
class Card{
    private string $suit;
    private string $symbol;
    private int $value;

    function __construct($st,$sy,$val){
        $this->setSuit($st);
        $this->setSymbol($sy);
        $this->setValue($val);
    }
    public function getSuit(): string{
        return $this->suit;
    }

    public function setSuit(string $suit): void{
        $this->suit = $suit;
    }

    public function getSymbol(): string{
        return $this->symbol;
    }

    public function setSymbol(string $symbol): void{
        $this->symbol = $symbol;
    }

    public function getValue(): int{
        return $this->value;
    }


    public function setValue(int $value): void{
        $this->value = $value;
    }

    public function listCard(): string{
        return $this->getSuit()." ".$this->getSymbol()." ".$this->getValue();
    }
}
