<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileResource extends Model
{
    protected $table = 'file_resources';

    protected $fillable = [
        'name',
        'description',
        'filename',
        'file_path'
    ];

    public function setFile(UploadedFile $file)
    {
        $filename = $file->getClientOriginalName();
        $file->move(public_path('documents/resources'), $filename);

        $this->filename = $filename;
        $this->file_path = '/documents/resources/'.$filename;

        return $this->save();
    }
}
