<?php

declare(strict_types=1);

namespace PavloMedynskyi\Scoreboard;

/**
 * Class UpdateScoreCommand
 * @package PavloMedynskyi\Scoreboard
 */
class UpdateScoreCommand implements ICommand
{
    /**
     * @var Game $game
     */
    private Game $game;

    /**
     * @var int $homeScore
     */
    private int $homeScore;

    /**
     * @var int $awayScore
     */
    private int $awayScore;

    /**
     * @param Game $game
     * @param int $homeScore
     * @param int $awayScore
     */
    public function __construct(Game $game, int $homeScore, int $awayScore)
    {
        $this->game = $game;
        $this->homeScore = $homeScore;
        $this->awayScore = $awayScore;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        $this->game->updateScore($this->homeScore, $this->awayScore);
    }
}