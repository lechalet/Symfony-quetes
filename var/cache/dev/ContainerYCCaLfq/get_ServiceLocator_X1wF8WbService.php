<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.X1wF8Wb' shared service.

return $this->privates['.service_locator.X1wF8Wb'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'episodesRepository' => ['privates', 'App\\Repository\\EpisodesRepository', 'getEpisodesRepositoryService.php', true],
    'programRepository' => ['privates', 'App\\Repository\\ProgramRepository', 'getProgramRepositoryService.php', true],
    'seasonRepository' => ['privates', 'App\\Repository\\SeasonRepository', 'getSeasonRepositoryService.php', true],
], [
    'episodesRepository' => 'App\\Repository\\EpisodesRepository',
    'programRepository' => 'App\\Repository\\ProgramRepository',
    'seasonRepository' => 'App\\Repository\\SeasonRepository',
]);
