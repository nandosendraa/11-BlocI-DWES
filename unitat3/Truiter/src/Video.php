<?php

class Video extends Media
{
    private int $duration;

    public function __construct(string $caption, int $width, int $height,int $duration)
    {
        $this->setDuration($duration);
        parent::__construct($caption, $width, $height);
    }

    public function getSummary(): string
    {
        $caption = $this->getCaption();
        $width = $this->getWidth();
        $height = $this->getHeight();
        return $caption." [".$width."x".$height."]"."(".$this->duration."s".")";
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

}