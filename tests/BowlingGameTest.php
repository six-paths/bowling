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

    public function testGutterGame(): void
    {
        $this->rollMany(20, 0);

        $this->assertEquals(0, $this->game->getScore());
    }

    public function testAllOnesGame(): void
    {
        $this->rollMany(20, 1);

        $this->assertEquals(20, $this->game->getScore());
    }

    private function rollMany(int $rolls, int $pins): void
    {
        for ($i = 0; $i < $rolls; $i++) {
            $this->game->roll($pins);
        }
    }
}
