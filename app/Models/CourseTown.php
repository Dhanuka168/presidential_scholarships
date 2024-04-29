<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTown extends Model
{
    use HasFactory;

    protected $fillable = [
        'town',
    ];
}
