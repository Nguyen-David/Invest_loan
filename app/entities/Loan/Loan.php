<?php


namespace app\entities\Loan;

use app\entities\DomainEntity;
use app\entities\Tranche\TrancheInterface;

/**
 * Class Loan
 * @package app\entities\LoanInterface
 */
class Loan extends DomainEntity implements LoanInterface
{
    /**
     * @var string
     */
    private $startDate;

    /**
     * @var string
     */
    private $endDate;

    /**
     * @var array
     */
    private $tranches;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return string;
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param $startDate
     * @return void
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param $endDate
     * @return void
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @param $name
     * @return TrancheInterface
     */
    public function getTranche($name)
    {
        return $this->tranches[$name];
    }

    /**
     * @param TrancheInterface $tranche
     */
    public function setTranche(TrancheInterface $tranche)
    {
        $this->tranches[$tranche->getName()] = $tranche;
    }


}