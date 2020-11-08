<?php


namespace app\storage\repositories;


use app\entities\DomainEntity;

interface DomainRepositoryInterface
{
    public function find($id);

    public function save(DomainEntity $entity);
}