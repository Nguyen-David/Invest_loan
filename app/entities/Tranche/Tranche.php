<?php


namespace app\entities\Tranche;

/**
 * Class Tranche
 * @package app\entities\Tranche
 */
class Tranche implements TrancheInterface
{
    /**
     * @var int
     */
    private $monthPercentage;

    /**
     * @var double
     */
    private $maxInvest;

    /**
     * Tranche constructor.
     * @param $monthPercentage
     * @param $maxInvest
     */
    public function __construct($monthPercentage, $maxInvest)
    {
        $this->monthPercentage = $monthPercentage;
        $this->maxInvest = $maxInvest;
    }

    /**
     * @return int
     */
    public function getMonthPercentage()
    {
        return $this->monthPercentage;
    }

    /**
     * @param $monthPercentage
     * @return void
     */
    public function setMonthPercentage($monthPercentage)
    {
        $this->monthPercentage = $monthPercentage;
    }

    /**
     * @return double
     */
    public function getMaximumInvestAmount()
    {
        return $this->maxInvest;
    }

    /**
     * @param $maxInvest
     * @return void
     */
    public function setMaximumInvestAmount($maxInvest)
    {
        $this->maxInvest = $maxInvest;
    }
}