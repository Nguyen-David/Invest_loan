<?php


namespace app\commands;


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
     * @param array $parameters
     * @return bool
     * @throws \Exception
     */
    public function run(array $parameters)
    {
        $loan = $this->loanRepository->find($parameters['loanId']);
        $tranche = $loan->getTranche($parameters['TrancheName']);
        if($this->validator->validate($tranche, $parameters['investSum'])){
            $this->investService->invest($tranche, $parameters['name'], $parameters['investSum'], $parameters['investDate']);
        }
        return true;
    }
}