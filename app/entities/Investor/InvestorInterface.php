<?php

namespace app\entities\Investor;

/**
 * Interface InvestorInterface
 * @package app\entities\Investor
 */
interface InvestorInterface {

    /**
     * @return string
     */
    public function getName();

    /**
     * @return void
     */
    public function setName($name);

    /**
     * @return double
     */
    public function getInvestSum();

    /**
     * @param $sum
     * @return void
     */
    public function setInvestSum($sum);

    /**
     * @return string
     */
    public function getInvestDate();

    /**
     * @param $date
     * @return void
     */
    public function setInvestDate($date);

}