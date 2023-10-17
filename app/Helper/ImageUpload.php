<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUpload
{
    private $_disk = 'public';

    public function uploadImage($file, $filePath)
    {
        $name = Str::random(4) . '_' . $file->getClientOriginalName();
        $path = $filePath . '' . $name;
        Storage::disk($this->_disk)->put($path, File::get($file));

        return [
            'name' => $name,
            'url' => $path,
        ];
    }

    public function deleteImage($filePath)
    {
        return Storage::disk($this->_disk)->delete($filePath);
    }

    public function imagePath($filePath)
    {
        return "/storage/" . $filePath;
    }
}
