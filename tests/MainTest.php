<?php


use app\commands\CalculateInvestSumCommand;
use app\commands\CreateTranchesCommand;
use app\commands\InvestInTrancheCommand;
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

        $createTranches = $this->container->get(CreateTranchesCommand::class);

        $this->app->run($createTranches, ['loanId' => $loanId, 'tranches' => ['a' => ['monthPercentage' => 3, 'maxInvest' => 1000] , 'b' =>  ['monthPercentage' => 6, 'maxInvest' => 1000] ]]);

        $investInTranches = $this->container->get(InvestInTrancheCommand::class);

        $investor1 = $this->app->run($investInTranches, ['loanId'=> $loanId, 'TrancheName' => 'a', 'name' => 'Investor1', 'investSum' => 1000, 'investDate' => '03/10/2015' ]);

        $this->assertEquals(true, $investor1);

        $exceptionInvestor2 = null;
        try {
            $this->app->run($investInTranches, ['loanId'=> $loanId, 'TrancheName' => 'a', 'name' => 'Investor2', 'investSum' => 1, 'investDate' => '04-10-2015' ]);
        } catch(Exception $e) {
            $exceptionInvestor2 = $e;
        }
        $this->assertInstanceOf(Exception::class, $exceptionInvestor2);

        $investor3 = $this->app->run($investInTranches, ['loanId'=> $loanId, 'TrancheName' => 'b', 'name' => 'Investor3', 'investSum' => 500, 'investDate' => '10/10/2015' ]);

        $this->assertEquals(true, $investor3);

        $exceptionInvestor4 = null;
        try {
            $this->app->run($investInTranches, ['loanId'=> $loanId, 'TrancheName' => 'b', 'name' => 'Investor4', 'investSum' => 1100, 'investDate' => '25-10-2015' ]);
        } catch(Exception $e) {
            $exceptionInvestor4 = $e;
        }
        $this->assertInstanceOf(Exception::class, $exceptionInvestor4);

        $calculateInvestSum =  $this->container->get(CalculateInvestSumCommand::class);

        $investorsTrancheA = $this->app->run($calculateInvestSum, ['loanId'=> $loanId, 'TrancheName' => 'a']);

        foreach ($investorsTrancheA as $investor) {
            if($investor['name'] == 'Investor1'){
                $this->assertEquals(28.06, $investor['sumEarn']);
            }
        }

        $investorsTrancheB  = $this->app->run($calculateInvestSum, ['loanId'=> $loanId, 'TrancheName' => 'b']);

        foreach ($investorsTrancheB as $investor) {
            if($investor['name'] == 'Investor3'){
                $this->assertEquals(21.29, $investor['sumEarn']);
            }
        }

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