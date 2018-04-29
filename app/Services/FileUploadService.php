<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/1/17
 * Time: 5:42 PM
 */

namespace App\Services;
use File;
use Image;

class FileUploadService
{
    /**
     * @param $file
     * @param $uploadPath
     * @return null|string
     */
    public function saveFile($file, $uploadPath)
    {
        if (isset($file)) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath,$fileName);
            return $fileName;
        }
        return null;
    }

    /**
     * @param $file
     * @param $uploadPath
     * @return bool
     */
    public function removeFile($file, $uploadPath)
    {
        if (!$file) {
            return false;
        }

        $deleteOldImage = $uploadPath . '/' . $file;
        if (File::isFile($deleteOldImage)) {
            File::delete($deleteOldImage);
        }

        return true;
    }

    /**
     * @param $file
     * @param $oldFileName
     * @param $fileUploadPath
     * @return null|string
     */
    public function handleFileUpload($file, $oldFileName,$fileUploadPath)
    {
        $newFileName = $this->saveFile($file, $fileUploadPath);

        if ($newFileName) {
            // remove this
            $fileName_old = $oldFileName;
            $this->removeFile($fileName_old, $fileUploadPath);
        }

        return $newFileName;
    }

    /**
     * @param $file
     * @param $oldFile
     * @param $filePath
     * @return null|string
     */
    public function replaceUploadedFile($file, $oldFile,$filePath)
    {
        $newFileName = $this->saveFile($file, $filePath);

        if ($newFileName) {
            // remove this
            if (File::isFile($oldFile)) {
                File::delete($oldFile);
            }
        }

        return $newFileName;
    }

}