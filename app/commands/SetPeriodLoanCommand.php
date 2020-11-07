<?php


namespace app\commands;


use app\entities\Loan\LoanInterface;

/**
 * Class SetPeriodLoanCommand
 * @package app\commands
 */
class SetPeriodLoanCommand implements CommandInterface
{
    /**
     * @var LoanInterface
     */
    private $loan;

    public function __construct(LoanInterface $loan)
    {
        $this->loan = $loan;
    }

    /**
     * @param array $parameters
     * @return void
     */
    public function run(array $parameters)
    {
        $this->loan->setStartDate($parameters['startLoan']);
        $this->loan->setEndDate($parameters['endLoan']);
    }
}