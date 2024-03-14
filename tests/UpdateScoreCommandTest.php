<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PavloMedynskyi\Scoreboard\Game;
use PavloMedynskyi\Scoreboard\UpdateScoreCommand;

final class UpdateScoreCommandTest extends TestCase
{
    public function testExecute(): void
    {
        $game = new Game('Home', 'Away');
        $game->start();
        $command = new UpdateScoreCommand($game, 1, 2);
        $command->execute();
        $this->assertEquals('Home 1 - Away 2', $game->getSummary());
    }
}