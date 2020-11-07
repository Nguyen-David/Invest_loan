<?php

namespace app\commands;

/**
 * Interface CommandInterface
 * @package app\commands
 */
interface CommandInterface {
    /**
     * @param array $parameters
     * @return
     */
    public function run(array $parameters);
}