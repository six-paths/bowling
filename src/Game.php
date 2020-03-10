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
            if ($this->isStrike($rollIndex)) {
                $score += 10 + $this->getAddedScoreForStrike($rollIndex);

                $rollIndex++;
            } elseif ($this->isSpare($rollIndex)) {
                $score += 10 + $this->getAddedScoreForSpare($rollIndex);

                $rollIndex += 2;
            } else {
                $score += $this->getFrameScore($rollIndex);

                $rollIndex += 2;
            }
        }

        return $score;
    }

    private function isStrike(int $rollIndex): bool
    {
        return $this->rolls[$rollIndex] === 10;
    }

    private function getAddedScoreForStrike(int $rollIndex): int
    {
        return $this->rolls[$rollIndex + 1] + $this->rolls[$rollIndex + 2];
    }

    private function isSpare(int $rollIndex): bool
    {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1] === 10;
    }

    private function getAddedScoreForSpare(int $rollIndex): int
    {
        return $this->rolls[$rollIndex + 2];
    }

    private function getFrameScore(int $rollIndex): int
    {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];
    }
}
