<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class FileUpload {
    public static function uploadFiles($files) {
        $uploadedImages = [];

        foreach ($files as $file) {
            $newName = Str::uuid() . "." . $file->getClientOriginalExtension();

            $path = $file->storeAs('parks', $newName, 'public');
            $uploadedImages[] = $path;
        }

        return $uploadedImages;
    }
}