<?php


namespace app\commands;


use app\entities\Loan\LoanInterface;

class CalculateInvestSumCommand implements CommandInterface
{

    private $loan;

    public function __construct(LoanInterface $loan)
    {
        $this->loan = $loan;
    }

    /**
     * @param array $parameters
     * @return
     */
    public function run(array $parameters)
    {
        $tranche = $this->loan->getTranche($parameters['TrancheName']);
        $investors = $tranche->getInvestors();
        foreach ($investors as $investor){
            $periodInvestments = 31 - (int) date("d",$investor->getInvestDate());
        }
    }
}