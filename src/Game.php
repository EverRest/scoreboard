<?php

declare(strict_types=1);

namespace PavloMedynskyi\Scoreboard;

/**
 * Class UpdateScoreCommand
 * @package PavloMedynskyi\Scoreboard
 */
class Game
{
    /**
     * @var string $homeTeam
     */
    private string $homeTeam;

    /**
     * @var string $awayTeam
     */
    private string $awayTeam;

    /**
     * @var int $homeScore
     */
    private int $homeScore = 0;

    /**
     * @var int $awayScore
     */
    private int $awayScore = 0;

    /**
     * @var bool $isFinished
     */
    private bool $isFinished = false;

    /**
     * @param string $homeTeam
     * @param string $awayTeam
     */
    public function __construct(string $homeTeam, string $awayTeam)
    {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
    }

    /**
     * @return void
     */
    public function start(): void
    {
        $this->homeScore = 0;
        $this->awayScore = 0;
        $this->isFinished = false;
    }

    /**
     * @return void
     */
    public function finish(): void
    {
        $this->isFinished = true;
    }

    /**
     * @param int $homeScore
     * @param int $awayScore
     *
     * @return void
     */
    public function updateScore(int $homeScore, int $awayScore): void
    {
        $this->homeScore = $homeScore;
        $this->awayScore = $awayScore;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return "{$this->homeTeam} {$this->homeScore} - {$this->awayTeam} {$this->awayScore}";
    }

    /**
     * @return bool
     */
    public function isFinished(): bool
    {
        return $this->isFinished;
    }

    /**
     * @return int
     */
    public function getTotalScore(): int
    {
        return $this->homeScore + $this->awayScore;
    }
}