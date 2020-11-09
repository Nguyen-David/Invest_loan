<?php


namespace app\commands;


use app\services\InvestCalculateService\InvestCalculateServiceInterface;
use app\storage\repositories\LoanRepositoryInterface;

/**
 * Class CalculateInvestSumCommand
 * @package app\commands
 */
class CalculateInvestSumCommand implements CommandInterface
{

    /**
     * @var LoanRepositoryInterface
     */
    private $loanRepository;

    /**
     * @var InvestCalculateServiceInterface
     */
    private $investCalculateService;

    /**
     * CalculateInvestSumCommand constructor.
     * @param LoanRepositoryInterface $loanRepository
     * @param InvestCalculateServiceInterface $investCalculateService
     */
    public function __construct(LoanRepositoryInterface $loanRepository, InvestCalculateServiceInterface $investCalculateService)
    {
        $this->loanRepository = $loanRepository;
        $this->investCalculateService = $investCalculateService;
    }

    /**
     * @param array $parameters
     * @return array
     */
    public function run(array $parameters)
    {
        $loan = $this->loanRepository->find($parameters['loanId']);
        $tranche = $loan->getTranche($parameters['TrancheName']);
        $investorsEarn =  $this->investCalculateService->calculateInvest($loan,$tranche);
        return $investorsEarn;
    }
}