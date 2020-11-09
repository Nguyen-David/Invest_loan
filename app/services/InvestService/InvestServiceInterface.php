<?php

namespace app\services\InvestService;

use app\entities\Tranche\TrancheInterface;

/**
 * Interface InvestServiceInterface
 * @package app\services\InvestService
 */
interface InvestServiceInterface {

    /**
     * @param TrancheInterface $tranche
     * @param $name
     * @param $investSum
     * @param $investDate
     * @return mixed
     */
    public function invest(TrancheInterface $tranche, $name, $investSum, $investDate);

}