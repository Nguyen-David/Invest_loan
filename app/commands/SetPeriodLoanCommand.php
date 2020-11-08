<?php


namespace app\commands;


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
     * @param array $parameters
     * @return void
     */
    public function run(array $parameters)
    {
        $loan = new Loan($parameters['startLoan'], $parameters['endLoan']);
        $this->loanRepository->save($loan);
        return $loan->getId();
    }
}