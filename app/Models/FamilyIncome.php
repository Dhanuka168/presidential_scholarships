<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyIncome extends Model
{
    use HasFactory;

    protected $fillable = [
        'monthly_income',
        'income_certificate',
        'personal_information_id'
    ];
}
