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

    /**
     * Investor constructor.
     * @param $name
     * @param $investSum
     * @param $investDate
     * @throws \Exception
     */
    public function __construct($name,$investSum, $investDate)
    {
        $this->name = $name;
        $this->investSum = $investSum;
        $this->investDate = $this->validateDate($investDate);
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

    /**
     * @param $date
     * @return string
     * @throws \Exception
     */
    private function validateDate($date)
    {
        if(!preg_match("/\d{2}(-|\/)\d{2}(-|\/)\d{4}/", $date)) {
            throw new \Exception('Date format in Invest Day must be day/month/year or day-month-year, eg 01/01/2020');
        }
        return $date;
    }
}