<?php

namespace config;


use app\commands\CreateTranchesCommand;
use app\commands\InvestInTrancheCommand;
use app\commands\SetPeriodLoanCommand;
use app\entities\Loan\Loan;
use app\entities\Loan\LoanInterface;
use app\entities\Tranche\Tranche;
use app\entities\Tranche\TrancheInterface;
use app\storage\repositories\LoanRepository;
use app\storage\repositories\LoanRepositoryInterface;
use app\storage\Storage;
use Psr\Container\ContainerInterface;

$storage = new Storage();

return [
    'definitions' => [
            LoanRepositoryInterface::class => function (ContainerInterface $container) use (&$storage) {
                return new LoanRepository($storage, 'loans');
            },
            SetPeriodLoanCommand::class => SetPeriodLoanCommand::class,
            CreateTranchesCommand::class => CreateTranchesCommand::class,
            InvestInTrancheCommand::class => InvestInTrancheCommand::class
    ]
];