<?php


namespace app\entities;

/**
 * Class DomainEntity
 * @package app\entities
 */
abstract class DomainEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}