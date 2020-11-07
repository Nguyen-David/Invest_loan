<?php


namespace app\entities\Loan;

use app\entities\Tranche\TrancheInterface;

/**
 * Class Loan
 * @package app\entities\LoanInterface
 */
class Loan implements LoanInterface
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
     * @return array
     */
    public function getTranche()
    {
        return $this->tranches;
    }

    /**
     * @param TrancheInterface $tranche
     */
    public function setTranche(TrancheInterface $tranche)
    {
        $this->tranches[] = $tranche;
    }


}