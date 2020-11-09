<?php

namespace config;


use app\commands\CreateTranchesCommand;
use app\commands\InvestInTrancheCommand;
use app\commands\SetPeriodLoanCommand;
use app\services\InvestCalculateService\InvestCalculateServiceInterface;
use app\services\InvestCalculateService\InvestCalculationService;
use app\services\InvestService\InvestService;
use app\services\InvestService\InvestServiceInterface;
use app\storage\repositories\LoanRepository;
use app\storage\repositories\LoanRepositoryInterface;
use app\storage\Storage;
use app\validators\InvestValidatorInterface;
use InvestValidator;
use Psr\Container\ContainerInterface;

$storage = new Storage();

return [
    'definitions' => [
            LoanRepositoryInterface::class => function (ContainerInterface $container) use (&$storage) {
                return new LoanRepository($storage, 'loans');
            },
            InvestValidatorInterface::class => InvestValidator::class,
            InvestServiceInterface::class => InvestService::class,
            InvestCalculateServiceInterface::class => InvestCalculationService::class,
            SetPeriodLoanCommand::class => SetPeriodLoanCommand::class,
            CreateTranchesCommand::class => CreateTranchesCommand::class,
            InvestInTrancheCommand::class => InvestInTrancheCommand::class
    ]
];