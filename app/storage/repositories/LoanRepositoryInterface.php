<?php


namespace app\storage\repositories;


use app\entities\Loan\LoanInterface;

interface LoanRepositoryInterface extends DomainRepositoryInterface
{
    /**
     * @param $id
     * @return LoanInterface|null
     */
    public function find($id);
}