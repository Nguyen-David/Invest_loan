<?php


namespace app\commands;


use app\entities\Tranche\Tranche;
use app\storage\repositories\LoanRepositoryInterface;

/**
 * Class CreateTranchesCommand
 * @package app\commands
 */
class CreateTranchesCommand implements CommandInterface
{

    /**
     * @var LoanRepositoryInterface
     */
    private $loanRepository;

    /**
     * CreateTranchesCommand constructor.
     * @param LoanRepositoryInterface $loan
     */
    public function __construct(LoanRepositoryInterface $loan)
    {
        $this->loanRepository = $loan;
    }

    /**
     * @param array $parameters
     * @return void
     */
    public function run(array $parameters)
    {
        $loan = $this->loanRepository->find($parameters['loanId']);
        foreach ($parameters['tranches'] as $name => $parameter){
            $loan->setTranche(new Tranche($name,$parameter['monthPercentage'],$parameter['maxInvest']));
        }
        $this->loanRepository->save($loan);
    }
}