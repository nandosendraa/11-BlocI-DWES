<?php
abstract class Media
{
    private string $caption;
    private int $width;
    private int $height;

    public function __construct(string $caption, int $width, int $height){
        $this->setCaption($caption);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    public function getCaption(): string
    {
        return $this->caption;
    }

    public function setCaption(string $caption): void
    {
        $this->caption = $caption;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public abstract function getSummary(): string;



}