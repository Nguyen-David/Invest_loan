<?php


namespace app\commands;


use app\dto\DtoInterface;
use app\entities\Investor\Investor;
use app\entities\Loan\LoanInterface;
use app\services\InvestService\InvestServiceInterface;
use app\storage\repositories\LoanRepositoryInterface;
use app\validators\InvestValidatorInterface;

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
     * @var InvestValidatorInterface
     */
    private $validator;

    /**
     * @var InvestServiceInterface
     */
    private $investService;

    /**
     * InvestInTrancheCommand constructor.
     * @param LoanRepositoryInterface $loanRepository
     * @param InvestValidatorInterface $validator
     * @param InvestServiceInterface $investService
     */
    public function __construct(
        LoanRepositoryInterface $loanRepository,
        InvestValidatorInterface $validator,
        InvestServiceInterface $investService
    )
    {
        $this->loanRepository = $loanRepository;
        $this->validator = $validator;
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
        if($this->validator->validate($tranche, $dto->investSum)){
            $this->investService->invest($tranche, $dto->investorName, $dto->investSum, $dto->investDate);
        }
        return true;
    }
}