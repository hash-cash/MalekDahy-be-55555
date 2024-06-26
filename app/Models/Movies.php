<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    protected $table = 'movies';
    protected $fillable = ['id', 'title', 'genre', 'duration', 'views', 'rating', 'poster', 'description'];

    public $timestamps = false;
}
