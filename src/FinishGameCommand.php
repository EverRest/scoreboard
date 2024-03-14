<?php

declare(strict_types=1);

namespace PavloMedynskyi\Scoreboard;

/**
 * Class UpdateScoreCommand
 * @package PavloMedynskyi\Scoreboard
 */
class FinishGameCommand implements ICommand
{
    /**
     * @var Game $game
     */
    private Game $game;

    /**
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        $this->game->finish();
    }
}