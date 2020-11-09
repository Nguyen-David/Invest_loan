<?php


namespace app\services\InvestCalculateService;

use app\entities\Investor\InvestorInterface;
use app\entities\Loan\LoanInterface;
use app\entities\Tranche\TrancheInterface;

/**
 * Class InvestCalculationService
 * @package app\services\InvestCalculateService
 */
class InvestCalculationService implements InvestCalculateServiceInterface
{

    /**
     * @param LoanInterface $loan
     * @param TrancheInterface $tranche
     * @return array
     */
    public function calculateInvest(LoanInterface $loan, TrancheInterface $tranche)
    {
        $investors = $tranche->getInvestors();
        $investorsEarns = [];
        foreach ($investors as $investor){
            $investDate = date_parse_from_format('d/m/Y', $investor->getInvestDate());
            $dayInMonth = cal_days_in_month(CAL_GREGORIAN,$investDate['month'],$investDate['year']);
            $periodInvestments = $dayInMonth - $investDate['day']+1;
            $maxEarnSumByMonth = $investor->getInvestSum() / 100 * $tranche->getMonthPercentage();
            $earnWithInvestDate = $maxEarnSumByMonth / $dayInMonth * $periodInvestments;
            $investorsEarns[] = ['name' => $investor->getName(), 'sumEarn' => round($earnWithInvestDate, 2)];
        }

        return $investorsEarns;
    }

}