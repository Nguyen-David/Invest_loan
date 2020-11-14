<?php


namespace app\commands;


use app\dto\DtoInterface;
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
     * @param DtoInterface $dto
     * @return void
     */
    public function run(DtoInterface $dto)
    {
        $loan = $this->loanRepository->find($dto->loanId);
        foreach ($dto->tranches as $name => $parameter){
            $loan->setTranche(new Tranche($name,$parameter['monthPercentage'],$parameter['maxInvest']));
        }
        $this->loanRepository->save($loan);
    }
}