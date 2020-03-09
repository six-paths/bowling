<?php

final class Game
{
    /**
     * @var int
     */
    private $score = 0;

    /**
     * @var array
     */
    private $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[count($this->rolls)] = $pins;
    }

    public function getScore(): int
    {
        $score = 0;
        $rollIndex = 0;

        for ($frame = 0; $frame < 10; $frame++, $rollIndex += 2) {
            $frameScore = $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];
            if ($frameScore === 10) {
                $frameScore += $this->rolls[$rollIndex + 2];
            }

            $score += $frameScore;
        }

        return $score;
    }
}
