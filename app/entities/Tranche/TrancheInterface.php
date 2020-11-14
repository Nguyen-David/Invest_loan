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
     * @return int
     */
    public function getMonthPercentage();

    /**
     * @return double
     */
    public function getMaximumInvestAmount();

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