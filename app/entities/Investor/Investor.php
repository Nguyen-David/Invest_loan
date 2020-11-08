<?php


namespace app\entities\Investor;


class Investor implements InvestorInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var double
     */
    private $investSum;

    /**
     * @var string
     */
    private $investDate;

    public function __construct($name,$investSum, $investDate)
    {
        $this->name = $name;
        $this->investSum = $investSum;
        $this->investDate = $investDate;
    }

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * @return string
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
    }

    /**
     * @return double
     */
    public function getInvestSum()
    {
        // TODO: Implement getInvestSum() method.
    }

    /**
     * @param $sum
     * @return void
     */
    public function setInvestSum($sum)
    {
        // TODO: Implement setInvestSum() method.
    }

    /**
     * @return string
     */
    public function getInvestDate()
    {
        // TODO: Implement getInvestDate() method.
    }

    /**
     * @param $date
     * @return void
     */
    public function setInvestDate($date)
    {
        // TODO: Implement setInvestDate() method.
    }
}