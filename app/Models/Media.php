<?php

namespace App\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    protected $appends = ['url', 'extension'];

    public function getUrlAttribute()
    {
        return $this->getUrl();
    }
}
