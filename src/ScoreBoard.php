<?php

declare(strict_types=1);

namespace PavloMedynskyi\Scoreboard;

/**
 * Class UpdateScoreCommand
 * @package PavloMedynskyi\Scoreboard
 */
class ScoreBoard
{
    /**
     * @var array $games
     */
    private array $games = [];

    /**
     * @param Game $game
     *
     * @return void
     */
    public function addGame(Game $game): void
    {
        $this->games[] = $game;
    }

    /**
     * @param Game $game
     *
     * @return void
     */
    public function removeGame(Game $game): void
    {
        $key = array_search($game, $this->games, true);
        if ($key !== false) {
            unset($this->games[$key]);
        }
    }

    /**
     * @return array
     */
    public function getSummary(): array
    {
        usort($this->games, function (Game $a, Game $b) {
            return $b->getTotalScore() <=> $a->getTotalScore();
        });

        return array_reduce($this->games, function ($carry, Game $game) {
            $carry[] = $game->getSummary();
            return $carry;
        }, []);
    }
}