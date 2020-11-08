<?php

use app\commands\CreateTranchesCommand;
use app\commands\SetPeriodLoanCommand;
use app\container\Container;
use app\entities\Loan\LoanInterface;
use app\entities\Tranche\Tranche;

require_once './vendor/autoload.php';

$containerDefinitions = require  'config/container.php';

$container = new Container($containerDefinitions);

$app = new app\main\Application($container);

try{
$setPeriodLoanCommand = $container->get(SetPeriodLoanCommand::class);

$loanId = $app->run($setPeriodLoanCommand,['startLoan' => '01-10-2015', 'endLoan' => '15-11-2015']);

$createTranches = $container->get(CreateTranchesCommand::class);

$app->run($createTranches, ['loanId' => $loanId, 'tranches' => ['a' => ['monthPercentage' => 3, 'maxInvest' => 1000] , 'b' =>  ['monthPercentage' => 6, 'maxInvest' => 1000] ]]);



} catch (Exception $e) {
    echo 'Exception:' . $e->getMessage();
}




