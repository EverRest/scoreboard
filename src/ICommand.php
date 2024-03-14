<?php

declare(strict_types=1);

namespace PavloMedynskyi\Scoreboard;

/**
 * Class UpdateScoreCommand
 * @package PavloMedynskyi\Scoreboard
 */
interface ICommand
{
    /**
     * @return void
     */
    public function execute(): void;
}