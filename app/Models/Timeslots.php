<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslots extends Model
{
    use HasFactory;
    protected $table = 'timeslots';
    protected $fillable = ['id', 'movie_id', 'theater_name', 'theater_room_no', 'start_time', 'end_time'];

    public $timestamps = false;
}
