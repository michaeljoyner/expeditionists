<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/11/15
 * Time: 9:34 AM
 */

trait TestsImageUploads {

    protected function prepareFileUpload($path)
    {
        $this->assertFileExists($path);

        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        $mime = finfo_file($finfo, $path);

        return new \Symfony\Component\HttpFoundation\File\UploadedFile ($path, 'test-upload.png', $mime, 15004, null, true);
    }

}