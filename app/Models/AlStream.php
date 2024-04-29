<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlStream extends Model
{
    use HasFactory;

    protected $fillable = [
        'stream_name',
    ];
}
