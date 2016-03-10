<?php
use App\FileResource;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 3/9/16
 * Time: 12:37 AM
 */
class FileResourceSeeder extends Seeder
{

    public function run()
    {
        $exp = [
            'name' => 'Become an expeditionist',
            'description' => 'Detailed info on how one can become an expeditionist and what it involves. Only PDFs are valid.'
        ];

        $volunteer = [
            'name' => 'Become a volunteer',
            'description' => 'Detailed info on how one can become a volunteer and what it involves. Only PDFs are valid.'
        ];

        FileResource::create($exp);
        FileResource::create($volunteer);
    }

}