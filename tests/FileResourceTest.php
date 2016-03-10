<?php
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/8/16
 * Time: 11:16 PM
 */
class FileResourceTest extends TestCase
{

    use DatabaseMigrations, TestsImageUploads;

    /**
     *@test
     */
    public function a_new_file_can_be_associated_with_a_file_resource()
    {
        $resource = factory(\App\FileResource::class)->create();
        $file = $this->prepareFileUpload('tests/testpdf.pdf', 'testpdf.pdf');

        $resource->setFile($file);

        $this->seeInDatabase('file_resources', [
            'id' => $resource->id,
            'filename' => 'testpdf.pdf',
            'file_path' => '/public/file-resources/testpdf.pdf'
        ]);


    }

}