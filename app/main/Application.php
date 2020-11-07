<?php


namespace app\main;


use app\commands\CommandInterface;
use app\container\ContainerInterface;

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
     * @param array $parameters
     * @return
     */
    public function run(CommandInterface $command, array $parameters = [])
    {
        return $command->run($parameters);
    }
}