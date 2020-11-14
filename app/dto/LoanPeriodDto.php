<?php

namespace app\dto;

/**
 * Class LoanPeriodDto
 * @package app\dto
 */
class LoanPeriodDto implements DtoInterface
{
    /**
     * @var string
     */
    public $startLoan;

    /**
     * @var string
     */
    public $endLoan;

    /**
     * LoanPeriodDto constructor.
     * @param string $startLoan
     * @param string $endLoan
     */
    public function __construct(string $startLoan, string $endLoan)
    {
        $this->startLoan = $startLoan;
        $this->endLoan = $endLoan;
    }
}