<?php

namespace config;

use app\commands\CreateTranchesCommand;
use app\commands\SetPeriodLoanCommand;
use app\entities\Loan\Loan;
use app\entities\Loan\LoanInterface;
use app\entities\Tranche\Tranche;
use app\entities\Tranche\TrancheInterface;

return [
    'definitions' => [
            LoanInterface::class => Loan::class,
            SetPeriodLoanCommand::class => SetPeriodLoanCommand::class,
            CreateTranchesCommand::class => CreateTranchesCommand::class
    ]
];