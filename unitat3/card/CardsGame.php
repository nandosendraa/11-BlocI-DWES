<?php

class CardsGame
{
    private array $symbols = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    private array $values = [14, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
    private CardCollection $deck;
    private CardCollection $handPlayer1;
    private CardCollection $handPlayer2;
    private CardCollectionWriterInterface $writer;

    // Es passa pel constructor una classe que implementa la interfície CardCollectionWriterInterface
    // Es creen els objectes que necessitem
    public function __construct(CardCollectionWriterInterface $writer)
    {
        $this->writer = $writer;
        $this->deck = new CardCollection();

        $this->handPlayer1 = new CardCollection();
        $this->handPlayer2 = new CardCollection();
    }

    // S'emplena la barralla
    public function setup()
    {
        foreach (Suit::cases() as $suit) {
            foreach ($this->symbols as $key => $symbol) {
                $this->deck->addCard(new Card($suit, $symbol, $this->values[$key]));
            }
        }
    }

    // Es baralla i es reparteixen les cartes
    public function start(): void
    {
        $this->deck->shuffle();
        $numberOfCards = 5;
        $this->handPlayer1->add($this->deck->deal($numberOfCards));
        $this->handPlayer2->add($this->deck->deal($numberOfCards));
    }

    // Es simula la partida
    public function play(): array
    {
        $results = [];
        while (count($this->handPlayer1->getCards()) > 0) {
            $card1 = $this->handPlayer1->play();
            $card2 = $this->handPlayer2->play();

            // operador nau espacial
            // echo 1 <=> 1; // 0
            // echo 1 <=> 2; // -1
            // echo 2 <=> 1; // 1

            //si result és positu guanya player 1
            // si eś negatiu guanya player 2
            // si zero empat
            $results[] = $card1->getValue() <=> $card2->getValue();
        }
        $result = array_sum($results);
        return $results;
        /* do {
            if ($result == 0) {
                $numberOfCards = 1;
                $this->handPlayer1->add($this->deck->deal($numberOfCards));
                $this->handPlayer2->add($this->deck->deal($numberOfCards));
            }
        } while ($result==0);*/
    }

    // Es genera l'html d'eixida
    public function render(): array
    {
        $deckOutput = $this->writer->write($this->deck);
        $cardsPlayer1 = $this->writer->write($this->handPlayer1);
        $cardsPlayer2 = $this->writer->write($this->handPlayer2);

        return ["deckOutput" => $deckOutput, "cardsPlayer1" => $cardsPlayer1,"cardsPlayer2" => $cardsPlayer2];
        //return compact("deckOutput", "cardsPlayer1", "cardsPlayer2");
    }
}