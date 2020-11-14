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
     * TrancheNameDto constructor.
     * @param int $loanId
     * @param string $trancheName
     */
    public function __construct(int $loanId,string $trancheName)
    {
        $this->loanId = $loanId;
        $this->trancheName = $trancheName;
    }

}