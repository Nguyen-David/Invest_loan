<?php


namespace app\commands;


use app\entities\Loan\LoanInterface;
use app\entities\Tranche\Tranche;

/**
 * Class CreateTranchesCommand
 * @package app\commands
 */
class CreateTranchesCommand implements CommandInterface
{

    /**
     * @var LoanInterface
     */
    private $loan;

    /**
     * CreateTranchesCommand constructor.
     * @param LoanInterface $loan
     */
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
        $this->loan->setTranche(new Tranche($parameters['a']['monthPercentage'],$parameters['a']['maxInvest']));
        $this->loan->setTranche(new Tranche($parameters['b']['monthPercentage'],$parameters['b']['maxInvest']));

    }
}