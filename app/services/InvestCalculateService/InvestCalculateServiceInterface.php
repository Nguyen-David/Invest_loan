<?php

namespace app\services\InvestCalculateService;

use app\entities\Loan\LoanInterface;
use app\entities\Tranche\TrancheInterface;

/**
 * Interface InvestCalculateService
 * @package app\services\InvestCalculateService
 */
interface InvestCalculateServiceInterface {
    /**
     * @param LoanInterface $loan
     * @param TrancheInterface $tranche
     * @return mixed
     */
    public function calculateInvest(LoanInterface $loan,TrancheInterface $tranche);
}