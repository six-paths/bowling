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
        $rollIndex = count($this->rolls);
        $this->rolls[$rollIndex] = $pins;
    }

    public function getScore(): int
    {
        $score = 0;
        $rollIndex = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->rolls[$rollIndex] === 10) {
                $score += 10;
                $score += $this->rolls[$rollIndex + 1];
                $score += $this->rolls[$rollIndex + 2];

                $rollIndex++;
            } elseif ($this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1] === 10) {
                $score += 10;
                $score += $this->rolls[$rollIndex + 2];

                $rollIndex += 2;
            } else {
                $score += $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];

                $rollIndex += 2;
            }
        }

        return $score;
    }
}
