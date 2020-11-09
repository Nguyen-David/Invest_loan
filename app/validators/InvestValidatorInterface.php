<?php

namespace app\validators;

use app\entities\Tranche\TrancheInterface;

/**
 * Interface InvestValidatorInterface
 * @package app\validators
 */
interface InvestValidatorInterface {
    /**
     * @param TrancheInterface $tranche
     * @param $investSum
     * @return bool
     */
    public function validate(TrancheInterface $tranche, $investSum);
}