<?php

interface CardCollectionWriterInterface
{
    public function write(CardCollection $cardCollection): string;
}