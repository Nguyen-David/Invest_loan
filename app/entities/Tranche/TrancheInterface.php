<?php

namespace app\entities\Tranche;

use app\entities\Investor\InvestorInterface;

/**
 * Interface TrancheInterface
 * @package app\entities\Tranche
 */
interface TrancheInterface {

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     * @return void
     */
    public function setName($name);

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

    /**
     * @return InvestorInterface[]
     */
    public function getInvestors();

    /**
     * @param $investor
     * @return void
     */
    public function setInvestor( InvestorInterface $investor);

}