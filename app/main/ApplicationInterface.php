<?php

namespace app\main;

use app\commands\CommandInterface;

/**
 * Interface ApplicationInterface
 * @package app\main
 */
interface ApplicationInterface {
    /**
     * @param CommandInterface $command
     * @param array $parameters
     * @return
     */
    public function run(CommandInterface $command, array $parameters = []);

}
