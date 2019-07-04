<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Movie extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'title', 'year', 'imdb_id', 'status'
    ];

    protected $appends = ['imdb_url', 'image_url'];

    public function getImdbUrlAttribute()
    {
        return "https://www.imdb.com/title/{$this->imdb_id}/";
    }

    public function getImageUrlAttribute()
    {
        return $this->getMedia('movies')[0]->getFullUrl();
    }
}
