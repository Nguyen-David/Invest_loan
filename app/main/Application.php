<?php


namespace app\main;


use app\commands\CommandInterface;
use app\container\ContainerInterface;
use app\dto\DtoInterface;

/**
 * Class Application
 * @package app\main
 */
class Application implements ApplicationInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @param CommandInterface $command
     * @param DtoInterface $dto
     * @return
     */
    public function run(CommandInterface $command, DtoInterface $dto)
    {
        return $command->run($dto);
    }
}