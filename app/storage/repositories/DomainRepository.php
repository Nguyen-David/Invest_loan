<?php


namespace app\storage\repositories;


use app\entities\DomainEntity;
use app\storage\StorageInterface;

abstract class DomainRepository implements DomainRepositoryInterface
{
    private $storage;

    private $tableName;

    public function __construct(StorageInterface $storage, $tableName)
    {
        $this->storage = $storage;
        $this->tableName = $tableName;
    }

    public function find($id)
    {
        return $this->storage->get($this->tableName, $id);
    }

    public function save(DomainEntity $entity)
    {
        $existingEntity = $this->find($entity->getId());
        if (!$existingEntity)
            $this->storage->push($this->tableName, $entity);
        else
            $this->storage->update($this->tableName, $entity);
    }


}