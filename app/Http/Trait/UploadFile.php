<?php

namespace App\Http\Trait;

use function file_exists;
use function public_path;
use function time;
use function unlink;

trait UploadFile
{
    private function uploadImage($file, $path, $old_file = null)
    {
        if($old_file){
            $this->deleteImage($old_file,$path);
        }
        $image_name = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path($path), $image_name);
        return $image_name;
    }

    private function deleteImage($old_file, $path)
    {
        if ($old_file) {
            if (file_exists(public_path($path . $old_file))) {
                unlink(public_path($path . $old_file));
            }
        }
    }
}
