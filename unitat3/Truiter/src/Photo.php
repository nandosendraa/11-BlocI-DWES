<?php

class Photo extends Media
{
    private string $altText;

    public function __construct(string $caption, int $width, int $height,string $altText)
    {
        $this->setAltText($altText);
        parent::__construct($caption, $width, $height);
    }

    public function getSummary(): string
    {
        $caption = $this->getCaption();
        $width = $this->getWidth();
        $height = $this->getHeight();
        return $caption." (".$this->altText.")"."[".$width."x".$height."]";
    }
    public function getAltText(): string
    {
        return $this->altText;
    }
    public function setAltText(string $altText): void
    {
        $this->altText = $altText;
    }

}