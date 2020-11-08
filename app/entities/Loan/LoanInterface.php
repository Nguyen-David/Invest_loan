<?php

namespace app\entities\Loan;

use app\entities\Tranche\TrancheInterface;

/**
 * Interface LoanInterface
 * @package app\entities\LoanInterface
 */
interface LoanInterface {
    /**
     * @return string;
     */
    public function getStartDate();

    /**
     * @param $startDate
     * @return void
     */
    public function setStartDate($startDate);

    /**
     * @return string
     */
    public function getEndDate();

    /**
     * @param $endDate
     * @return void
     */
    public function setEndDate($endDate);

    /**
     * @param $name
     * @return TrancheInterface
     */
    public function getTranche($name);

    /**
     * @param TrancheInterface $tranche
     */
    public function setTranche(TrancheInterface $tranche);
}