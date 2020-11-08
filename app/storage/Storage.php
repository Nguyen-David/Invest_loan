<?php


namespace app\storage;


use app\entities\DomainEntity;

class Storage implements StorageInterface
{

    private $data = [];

    public function push($table, DomainEntity $value)
    {
        $this->data[$table][] = $value;
        end($this->data[$table]);
        $value->setId(key($this->data[$table]));
        $this->data[$table][key($this->data[$table])] = $value;
        reset($this->data[$table]);

    }

    public function update($table, DomainEntity $value)
    {
        $id = $value->getId();
        if ($id) {
            $this->data[$table][$id] = $value;
        }
    }

    public function get($table, $id)
    {
        return $this->data[$table][$id] ?? null;
    }
}