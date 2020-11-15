<?php


use app\commands\CalculateInvestSumCommand;
use app\commands\CreateTranchesCommand;
use app\commands\InvestInTrancheCommand;
use app\commands\SetPeriodLoanCommand;
use app\container\Container;
use app\dto\InvestorDto;
use app\dto\LoanPeriodDto;
use app\dto\TrancheDto;
use app\dto\TrancheNameDto;
use PHPUnit\Framework\TestCase;

/**
 * Class MainTest
 */
class MainTest extends TestCase
{
    private $app;
    private $container;

    public function testApp()
    {

        $setPeriodLoanCommand = $this->container->get(SetPeriodLoanCommand::class);

        $loanPeriodDto = new LoanPeriodDto('01-10-2015',  '15/11/2015');

        $loanId = $this->app->run($setPeriodLoanCommand,$loanPeriodDto);

        $this->assertEquals(0, $loanId);


        $createTranches = $this->container->get(CreateTranchesCommand::class);

        $trancheDto = new TrancheDto($loanId,['a' => ['monthPercentage' => 3, 'maxInvest' => 1000] , 'b' =>  ['monthPercentage' => 6, 'maxInvest' => 1000] ]);

        $this->app->run($createTranches, $trancheDto);


        $investInTranches = $this->container->get(InvestInTrancheCommand::class);

        $investor1Dto = new InvestorDto($loanId,'a','Investor1',1000,'03/10/2015');

        $investor1Tranche = $this->app->run($investInTranches, $investor1Dto);

        $this->assertEquals(true, $investor1Tranche);


        $exceptionInvestor2 = null;
        try {
            $investor2Dto = new InvestorDto($loanId,'a','Investor2',1,'04/10/2015');
            $this->app->run($investInTranches, $investor2Dto);
        } catch(Exception $e) {
            $exceptionInvestor2 = $e;
        }
        $this->assertInstanceOf(Exception::class, $exceptionInvestor2);


        $investor3Dto = new InvestorDto($loanId,'b','Investor3',500,'10/10/2015');

        $investor3Tranche = $this->app->run($investInTranches, $investor3Dto);

        $this->assertEquals(true, $investor3Tranche);


        $exceptionInvestor4 = null;
        try {
            $investor4Dto = new InvestorDto($loanId,'b','Investor4',1100,'25/10/2015');
            $this->app->run($investInTranches, $investor4Dto);
        } catch(Exception $e) {
            $exceptionInvestor4 = $e;
        }
        $this->assertInstanceOf(Exception::class, $exceptionInvestor4);


        $calculateInvestSum =  $this->container->get(CalculateInvestSumCommand::class);

        $trancheNameADto = new TrancheNameDto($loanId, 'a');

        $investorsTrancheA = $this->app->run($calculateInvestSum, $trancheNameADto);

        $investor1 = $this->getInvestorFromResponse('Investor1',$investorsTrancheA);

        $this->assertEquals(28.06, $investor1['sumEarn']);

        $trancheNameBDto = new TrancheNameDto($loanId, 'b');

        $investorsTrancheB  = $this->app->run($calculateInvestSum, $trancheNameBDto);

        $investor3 = $this->getInvestorFromResponse('Investor3',$investorsTrancheB);

        $this->assertEquals(21.29, $investor3['sumEarn']);

    }

    /**
     * @param string $name
     * @param array $investors
     * @return array
     */
    private function getInvestorFromResponse(string $name, array $investors)
    {
        foreach ($investors as $investor) {
            if ($investor['name'] === $name)
                return $investor;
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