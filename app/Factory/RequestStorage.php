<?php


namespace App\Factory;


use App\Factory\Factories\RequestStorageFactory;

class RequestStorage
{
    private $instance;

    public function __construct(string $storageOperation)
    {
        $this->instance = RequestStorageFactory::storageOperation($storageOperation);
    }

    public function save(string $name, string $phone, string $text){
        $this->instance->save($name,$phone,$text);
    }
}
