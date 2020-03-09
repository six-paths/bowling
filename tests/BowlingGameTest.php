<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class BowlingGameTest extends TestCase
{
    /**
     * @var \Game
     */
    private $game;

    public function setUp(): void
    {
        $this->game = new Game;
    }

    public function testCanRoll(): void
    {
        $this->game->roll(0);
    }
}
