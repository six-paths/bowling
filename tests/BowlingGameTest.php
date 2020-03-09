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

    public function testGutterGame(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $this->game->roll(0);
        }

        $this->assertEquals(0, $this->game->getScore());
    }

    public function testAllOnesGame(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $this->game->roll(1);
        }

        $this->assertEquals(20, $this->game->getScore());
    }
}
