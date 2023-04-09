<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadFileService
{
    public function uploadImage(UploadedFile $file): string
    {
        $path = $file->storeAs('avatars', $file->hashName(), 'public');
        if ($path === false) {
            throw new UploadException('не удалось загрузить файл');
        }
        return $path;
    }
}
