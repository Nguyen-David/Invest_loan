<?php

namespace app\entities\Tranche;

/**
 * Interface TrancheInterface
 * @package app\entities\Tranche
 */
interface TrancheInterface {

    /**
     * @return int
     */
    public function getMonthPercentage();

    /**
     * @param $monthPercentage
     * @return void
     */
    public function setMonthPercentage($monthPercentage);

    /**
     * @return double
     */
    public function getMaximumInvestAmount();

    /**
     * @param $maxInvest
     * @return void
     */
    public function setMaximumInvestAmount($maxInvest);

}