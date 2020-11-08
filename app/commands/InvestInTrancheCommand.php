<?php


namespace app\commands;


use app\entities\Investor\Investor;
use app\entities\Loan\LoanInterface;
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
     * InvestInTrancheCommand constructor.
     * @param LoanRepositoryInterface $loan
     */
    public function __construct(LoanRepositoryInterface $loan)
    {
        $this->loanRepository = $loan;
    }

    /**
     * @param array $parameters
     * @return void
     * @throws \Exception
     */
    public function run(array $parameters)
    {
        $loan = $this->loanRepository->find($parameters['loanId']);
        $tranche = $loan->getTranche($parameters['TrancheName']);
        if($tranche->getMaximumInvestAmount() < $parameters['investSum']) {
            throw new \Exception('Invest sum more than available in the tranche');
        }
        $tranche->setInvestor(new Investor($parameters['name'], $parameters['investSum'], $parameters['investDate']));
        $tranche->setMaximumInvestAmount($tranche->getMaximumInvestAmount() - $parameters['investSum']);
    }
}