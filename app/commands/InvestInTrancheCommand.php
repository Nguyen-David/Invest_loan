<?php


namespace app\commands;


use app\dto\DtoInterface;
use app\services\InvestService\InvestServiceInterface;
use app\storage\repositories\LoanRepositoryInterface;

/**
 * Class InvestInTrancheCommand
 * @package app\commands
 */
class InvestInTrancheCommand implements CommandInterface
{
    /**
     * @var LoanRepositoryInterface
     */
    private $loanRepository;

    /**
     * @var InvestServiceInterface
     */
    private $investService;

    /**
     * InvestInTrancheCommand constructor.
     * @param LoanRepositoryInterface $loanRepository
     * @param InvestServiceInterface $investService
     */
    public function __construct(
        LoanRepositoryInterface $loanRepository,
        InvestServiceInterface $investService
    )
    {
        $this->loanRepository = $loanRepository;
        $this->investService = $investService;
    }

    /**
     * @param DtoInterface $dto
     * @return bool
     */
    public function run(DtoInterface $dto)
    {
        $loan = $this->loanRepository->find($dto->loanId);
        $tranche = $loan->getTranche($dto->trancheName);
        $this->investService->invest($tranche, $dto->investorName, $dto->investSum, $dto->investDate);

        return true;
    }
}