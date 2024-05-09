<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformersMovies extends Model
{
    use HasFactory;
    protected $table = 'performers_movies';
    protected $fillable = ['id', 'movie_id', 'name'];

    public $timestamps = false;
}
