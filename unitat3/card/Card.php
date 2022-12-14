<?php
class Card {
    private Suit $suit;
    private string $symbol;
    private int $value;

    /**
     * @param string $suit
     * @param string $symbol
     * @param int $value
     */
    public function __construct(Suit $suit,
        string $symbol, int $value)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getSuit(): Suit
    {
        return $this->suit;
    }

    /**
     * @param string $suit
     */
    public function setSuit(Suit $suit): void
    {
        $this->suit = $suit;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }


}