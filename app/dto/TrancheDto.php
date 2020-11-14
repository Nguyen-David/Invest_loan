<?php

namespace app\dto;

/**
 * Class TrancheDto
 * @package app\dto
 */
class TrancheDto implements DtoInterface
{
    /**
     * @var int
     */
    public $loanId;

    /**
     * @var array
     */
    public $tranches;

    /**
     * TrancheDto constructor.
     * @param int $loanId
     * @param array $tranches
     */
    public function __construct(int $loanId, array $tranches)
    {
        $this->loanId = $loanId;
        $this->tranches = $tranches;
    }

}