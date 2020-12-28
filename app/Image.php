<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['folder_id', 'filename', 'path'];

    public function folder()
    {
        return $this->belongsTo('App\Folder');
    }
}
