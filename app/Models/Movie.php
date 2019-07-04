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

    /**
     * function to get the imdb_url of the movie
     */
    public function getImdbUrlAttribute()
    {
        return "https://www.imdb.com/title/{$this->imdb_id}/";
    }

    /**
     * function to get the image for the movie
     */
    public function getImageUrlAttribute()
    {
        return $this->getMedia('movies')[0]->getFullUrl();
    }

    /**
     * Get the users that like this movie
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'favorite_movies');
    }
}
