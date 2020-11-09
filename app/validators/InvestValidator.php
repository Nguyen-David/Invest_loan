<?php


use app\entities\Tranche\TrancheInterface;
use app\validators\InvestValidatorInterface;

/**
 * Class InvestValidator
 */
class InvestValidator implements InvestValidatorInterface
{

    /**
     * @param TrancheInterface $tranche
     * @param $investSum
     * @return bool
     * @throws Exception
     */
    public function validate(TrancheInterface $tranche, $investSum)
    {
        if($tranche->getMaximumInvestAmount() < $investSum) {
            throw new \Exception('Invest sum more than available in the tranche');
        }
        return true;
    }

}