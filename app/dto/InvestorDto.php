<?php


namespace app\dto;

/**
 * Class InvestorDto
 * @package app\dto
 */
class InvestorDto implements DtoInterface
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
    public $investorName;

    /**
     * @var double
     */
    public $investSum;

    /**
     * @var string
     */
    public $investDate;

    /**
     * InvestorDto constructor.
     * @param string $loanId
     * @param string $trancheName
     * @param string $investorName
     * @param float $investSum
     * @param string $investDate
     */
    public function __construct(string $loanId, string $trancheName, string $investorName, float $investSum, string $investDate)
    {
        $this->loanId = $loanId;
        $this->trancheName = $trancheName;
        $this->investorName = $investorName;
        $this->investSum = $investSum;
        $this->investDate = $investDate;
    }

}