<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class BowlingGameTest extends TestCase
{
    public function testCanStartNewGame(): void
    {
        new Game;
    }

    public function testCanRoll(): void
    {
        $game = new Game;
        $game->roll(0);
    }
}
