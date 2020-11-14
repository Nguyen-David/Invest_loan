<?php

namespace app\commands;

use app\dto\DtoInterface;

/**
 * Interface CommandInterface
 * @package app\commands
 */
interface CommandInterface {
    /**
     * @param $dto
     * @return
     */
    public function run(DtoInterface $dto);
}