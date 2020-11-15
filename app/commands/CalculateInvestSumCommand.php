<?php


namespace app\commands;


use app\dto\DtoInterface;
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
     * @param DtoInterface $dto
     * @return array
     */
    public function run(DtoInterface $dto)
    {
        $loan = $this->loanRepository->find($dto->loanId);
        $tranche = $loan->getTranche($dto->trancheName);
        $investorsEarn =  $this->investCalculateService->calculateInvest($loan,$tranche,$dto->startPeriodCalculation,$dto->endPeriodCalculation);
        return $investorsEarn;
    }
}