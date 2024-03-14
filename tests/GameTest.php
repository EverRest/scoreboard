<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PavloMedynskyi\Scoreboard\Game;

final class GameTest extends TestCase
{
    public function testStart(): void
    {
        $game = new Game('Home', 'Away');
        $game->start();
        $this->assertEquals('Home 0 - Away 0', $game->getSummary());
        $this->assertFalse($game->isFinished());
    }

    public function testUpdateScore(): void
    {
        $game = new Game('Home', 'Away');
        $game->start();
        $game->updateScore(1, 2);
        $this->assertEquals('Home 1 - Away 2', $game->getSummary());
    }

    public function testFinish(): void
    {
        $game = new Game('Home', 'Away');
        $game->start();
        $game->finish();
        $this->assertTrue($game->isFinished());
    }

    public function testGetTotalScore(): void
    {
        $game = new Game('Home', 'Away');
        $game->start();
        $game->updateScore(1, 2);
        $this->assertEquals(3, $game->getTotalScore());
    }
}