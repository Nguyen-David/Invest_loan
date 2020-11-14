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

    /**
     * Loan constructor.
     * @param $startDate
     * @param $endDate
     * @throws \Exception
     */
    public function __construct(string $startDate,string $endDate)
    {
        $this->startDate = $this->validateDate($startDate);
        $this->endDate = $this->validateDate($endDate);
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

    /**
     * @param $date
     * @return string
     * @throws \Exception
     */
    private function validateDate($date)
    {
        if(!preg_match("/\d{2}(-|\/)\d{2}(-|\/)\d{4}/", $date)) {
            throw new \Exception('Date format must be day/month/year or day-month-year, eg 01/01/2020');
        }
        return $date;
    }

}