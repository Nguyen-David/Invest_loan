<?php

namespace app\main;

use app\commands\CommandInterface;
use app\dto\DtoInterface;

/**
 * Interface ApplicationInterface
 * @package app\main
 */
interface ApplicationInterface {
    /**
     * @param CommandInterface $command
     * @param DtoInterface $dto
     * @return
     */
    public function run(CommandInterface $command, DtoInterface $dto);

}
