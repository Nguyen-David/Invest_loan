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
        return $this->name;
    }

    /**
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return double
     */
    public function getInvestSum()
    {
        return $this->investSum;
    }

    /**
     * @param $sum
     * @return void
     */
    public function setInvestSum($sum)
    {
        $this->investSum = $sum;
    }

    /**
     * @return string
     */
    public function getInvestDate()
    {
        return $this->investDate;
    }

    /**
     * @param $date
     * @return void
     */
    public function setInvestDate($date)
    {
        $this->investDate = $date;
    }
}