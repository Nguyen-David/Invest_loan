<?php


namespace app\dto;


/**
 * Class TrancheNameDto
 * @package app\dto
 */
class TrancheNameDto implements DtoInterface
{
    /**
     * @var int
     */
    public $loanId;

    /**
     * @var string
     */
    public $trancheName;

    /**
     * @var string
     */
    public $startPeriodCalculation;

    /**
     * @var string
     */
    public $endPeriodCalculation;

    /**
     * TrancheNameDto constructor.
     * @param int $loanId
     * @param string $trancheName
     * @param string $startPeriodCalculation
     * @param string $endPeriodCalculation
     */
    public function __construct(int $loanId,string $trancheName, string $startPeriodCalculation, string $endPeriodCalculation)
    {
        $this->loanId = $loanId;
        $this->trancheName = $trancheName;
        $this->startPeriodCalculation = $startPeriodCalculation;
        $this->endPeriodCalculation = $endPeriodCalculation;
    }

}