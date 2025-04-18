<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait FileUploadTrait
{
    /**
     * Upload a file to the public directory and return its relative path.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @param string|null $existingFile
     * @return string|null
     */
    public function uploadFile($file, $folder, $existingFile = null)
    {
        if (!$file) {
            return $existingFile;
        }

        // Build folder path
        $targetFolder = public_path("upload/{$folder}");

        // Create folder if it doesn't exist
        if (!file_exists($targetFolder)) {
            mkdir($targetFolder, 0755, true);
        }

        // Delete existing file if it's a local path
        if ($existingFile && $this->isLocalPath($existingFile)) {
            $oldFilePath = public_path($existingFile);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // Save new file
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move($targetFolder, $fileName);

        // Return relative path only
        return "upload/{$folder}/{$fileName}";
    }

    /**
     * Check if a file path is a local relative path.
     *
     * @param string $path
     * @return bool
     */
    protected function isLocalPath($path)
    {
        return !Str::startsWith($path, ['http://', 'https://']);
    }
}
