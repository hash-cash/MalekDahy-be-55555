<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performers extends Model
{
    use HasFactory;
    protected $table = 'performers';
    protected $fillable = ['id', 'name'];

    public $timestamps = false;
}
