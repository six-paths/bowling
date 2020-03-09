<?php

final class Game
{
    /**
     * @var int
     */
    private $score = 0;

    public function roll(int $pins): void
    {
        $this->score += $pins;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}
