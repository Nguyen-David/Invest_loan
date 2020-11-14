<?php


namespace app\services\InvestService;


use app\entities\Investor\Investor;
use app\entities\Tranche\TrancheInterface;

class InvestService implements InvestServiceInterface
{

    /**
     * @param TrancheInterface $tranche
     * @param $name
     * @param $investSum
     * @param $investDate
     * @return mixed
     * @throws \Exception
     */
    public function invest(TrancheInterface $tranche, $name, $investSum, $investDate)
    {
        $tranche->setInvestor(new Investor($name, $investSum, $investDate));
        $availableMaxInvestSum = $tranche->getMaximumInvestAmount() - $investSum;
        $tranche->setMaximumInvestAmount($availableMaxInvestSum);
    }
}