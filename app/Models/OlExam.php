<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'school',
        'year',
        'index_no',
        'personal_information_id'
    ];
}
