<?php


namespace App\Factory\Factories;



use App\Factory\Operations\DBRequestStorage;
use App\Factory\Operations\FileRequestStorage;

class RequestStorageFactory
{
    private static $instances = [
        'DB' => DBRequestStorage::class,
        'FILE' => FileRequestStorage::class,
    ];

    public static function storageOperation(string $storage)
    {
        if (isset(self::$instances[$storage])) {
            return new self::$instances[$storage];
        }
        return null;
    }
}
