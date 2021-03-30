<?php


namespace App\Factory\Operations;


use App\Factory\Common\RequestStorageOperation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class FileRequestStorage implements RequestStorageOperation
{
    public function save(string $name, string $phone, string $text)
    {
        $disk = 'local';
        $storage = Config::get('request_storage.file.storage');

        $file_name = $storage . '\\' . Carbon::now()->format('Y_m_d-h_i_s') . '.txt';

        if (!Storage::disk($disk)->exists(storage_path($storage))) {
            Storage::disk($disk)->makeDirectory($storage);
        }

       return Storage::disk($disk)->put($file_name, "Имя - $name \nТелефон - $phone \nТекст - $text\n");
    }
}
