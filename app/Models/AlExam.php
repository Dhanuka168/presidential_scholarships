<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'school',
        'year',
        'index_no',
        'district_rank',
        'island_rank',
        'z_score',
        'stream_id',
        'personal_information_id'
    ];
}
