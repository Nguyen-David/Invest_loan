<?php


namespace app\commands;


use app\dto\DtoInterface;
use app\dto\LoanPeriodDto;
use app\entities\Loan\Loan;
use app\entities\Loan\LoanInterface;
use app\storage\repositories\LoanRepositoryInterface;

/**
 * Class SetPeriodLoanCommand
 * @package app\commands
 */
class SetPeriodLoanCommand implements CommandInterface
{
    /**
     * @var LoanRepositoryInterface
     */
    private $loanRepository;

    /**
     * SetPeriodLoanCommand constructor.
     * @param LoanRepositoryInterface $loanRepository
     */
    public function __construct(LoanRepositoryInterface $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    /**
     * @param DtoInterface $dto
     * @return void
     */
    public function run(DtoInterface $dto)
    {
        $loan = new Loan($dto->startLoan, $dto->endLoan);
        $this->loanRepository->save($loan);
        return $loan->getId();
    }
}