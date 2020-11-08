<?php


namespace app\storage;


use app\entities\DomainEntity;

interface StorageInterface
{
    public function push($table,DomainEntity $value);

    public function update($table, DomainEntity $value);

    public function get($table, $id);
}