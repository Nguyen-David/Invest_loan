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
     * @param string $startPeriodCalculation
     * @param string $endPeriodCalculation
     * @return array
     */
    public function calculateInvest(LoanInterface $loan, TrancheInterface $tranche, string $startPeriodCalculation, string $endPeriodCalculation)
    {
        $investors = $tranche->getInvestors();
        $investorsEarns = [];
        foreach ($investors as $investor){
            $investDate = $this->getDateAsArray($investor->getInvestDate());
            $dayInMonth = cal_days_in_month(CAL_GREGORIAN,$investDate['month'],$investDate['year']);
            $periodInvestments = $this->calculateInvestDays($investor->getInvestDate(),$endPeriodCalculation)+1;

            $maxEarnSumByMonth = $investor->getInvestSum() / 100 * $tranche->getMonthPercentage();
            $earnWithInvestDate = $maxEarnSumByMonth / $dayInMonth * $periodInvestments;
            $investorsEarns[] = ['name' => $investor->getName(), 'sumEarn' => round($earnWithInvestDate, 2)];
        }

        return $investorsEarns;
    }

    private function calculateInvestDays(string $investDate, string $endPeriodCalculation)
    {
        $d1_ts = strtotime(str_replace('/', '-', $investDate));
        $d2_ts = strtotime(str_replace('/', '-', $endPeriodCalculation));

        $seconds = abs($d1_ts - $d2_ts);
        return floor($seconds / 86400);
    }

    private function getDateAsArray(string $date)
    {
        return date_parse_from_format('d/m/Y', $date);
    }
}