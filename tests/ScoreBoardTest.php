<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PavloMedynskyi\Scoreboard\Game;
use PavloMedynskyi\Scoreboard\ScoreBoard;

final class ScoreBoardTest extends TestCase
{
    public function testAddGame(): void
    {
        $scoreBoard = new ScoreBoard();
        $game = new Game('Home', 'Away');
        $scoreBoard->addGame($game);
        $this->assertEquals(['Home 0 - Away 0'], $scoreBoard->getSummary());
    }

    public function testRemoveGame(): void
    {
        $scoreBoard = new ScoreBoard();
        $game = new Game('Home', 'Away');
        $scoreBoard->addGame($game);
        $scoreBoard->removeGame($game);
        $this->assertEquals([], $scoreBoard->getSummary());
    }

    public function testGetSummary(): void
    {
        $scoreBoard = new ScoreBoard();
        $game1 = new Game('Home1', 'Away1');
        $game1->start();
        $game1->updateScore(1, 2);
        $scoreBoard->addGame($game1);

        $game2 = new Game('Home2', 'Away2');
        $game2->start();
        $game2->updateScore(3, 4);
        $scoreBoard->addGame($game2);

        $this->assertEquals(['Home2 3 - Away2 4', 'Home1 1 - Away1 2'], $scoreBoard->getSummary());
    }
}