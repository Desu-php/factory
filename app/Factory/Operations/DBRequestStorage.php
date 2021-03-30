<?php


namespace App\Factory\Operations;


use App\Factory\Common\RequestStorageOperation;
use App\Models\Request;

class DBRequestStorage implements RequestStorageOperation
{

    public function save(string $name, string $phone, string $text)
    {
        return Request::create([
            'name' => $name,
            'phone' => $phone,
            'text' => $text
        ]);
    }
}
