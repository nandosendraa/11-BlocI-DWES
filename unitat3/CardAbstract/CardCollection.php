<?php

abstract class CardCollection
{
    protected array $cards;
    private int $index = 0;

    public function __construct()
    {
        $this->cards = [];
    }

    function add(array $array)
    {
        //$this->cards = $array;
        foreach($array as $card) {
            $this->addCard($card);
        }
    }

    function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    function getCards(): array {
        return $this->cards;
    }

    public function current(): mixed
    {
        // TODO: Implement current() method.
        return $this->cards[$this->index];
    }

    public function next(): void
    {
        // TODO: Implement next() method.
        $this->index++;
    }

    public function key(): mixed
    {
        // TODO: Implement key() method.
        return $this->index;
    }

    public function valid(): bool
    {
        // TODO: Implement valid() method.
        return array_key_exists($this->index, $this->cards);
    }

    public function rewind(): void
    {
        // TODO: Implement rewind() method.
        $this->index = 0;
    }
}

