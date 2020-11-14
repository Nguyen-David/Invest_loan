<?php


namespace app\entities\Tranche;

use app\entities\Investor\InvestorInterface;

/**
 * Class Tranche
 * @package app\entities\Tranche
 */
class Tranche implements TrancheInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $monthPercentage;

    /**
     * @var double
     */
    private $maxInvest;

    /**
     * @var InvestorInterface[]
     */
    private $investors;

    /**
     * Tranche constructor.
     * @param $name
     * @param $monthPercentage
     * @param $maxInvest
     */
    public function __construct($name,$monthPercentage, $maxInvest)
    {
        $this->name = $name;
        $this->monthPercentage = $monthPercentage;
        $this->maxInvest = $maxInvest;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return int
     */
    public function getMonthPercentage()
    {
        return $this->monthPercentage;
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

    /**
     * @return InvestorInterface[]
     */
    public function getInvestors()
    {
        return $this->investors;
    }

    /**
     * @param $investor
     * @return void
     */
    public function setInvestor(InvestorInterface $investor)
    {
        $this->investors[$investor->getName()] = $investor;
    }
}