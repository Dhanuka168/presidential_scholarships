<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlResults extends Model
{
    use HasFactory;

    protected $fillable = [
        'al_exam_id',
        'al_sub_id',
        'stream_id',
        'result'
    ];
}
