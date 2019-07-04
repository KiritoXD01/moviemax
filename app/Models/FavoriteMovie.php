<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteMovie extends Model
{
    protected $table = "favorite_movies";

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
