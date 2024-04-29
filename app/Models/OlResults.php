<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlResults extends Model
{
    use HasFactory;

    protected $fillable = [
        'ol_exam_id',
        'ol_sub_id',
        'result'
    ];
}
