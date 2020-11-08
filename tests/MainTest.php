<?php


use app\commands\SetPeriodLoanCommand;
use app\container\Container;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    private $app;
    private $container;

    public function testApp()
    {
        $setPeriodLoanCommand = $this->container->get(SetPeriodLoanCommand::class);

        $loanId = $this->app->run($setPeriodLoanCommand,['startLoan' => '01-10-2015', 'endLoan' => '15-11-2015']);

        $this->assertEquals(0, $loanId);
    }

    public function setUp(): void
    {
        parent::setUp();

        $containerDefinitions = require  'config/container.php';

        $container = new Container($containerDefinitions);

        $app = new app\main\Application($container);
        $this->app = $app;
        $this->container = $container;
    }
}