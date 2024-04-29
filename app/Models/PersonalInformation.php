<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'name_with_initials',
        'date_of_birth',
        'gender',
        'nic_number',
        'address',
        'email',
        'mobile',
        'land_line',
        'nic_doc_path',
        'batch_number',
        'provincial_id',
        'district_id',
        'ds_id',
        'institute_id',
        'course_id',
        'course_town_id',
        'app_no'
    ];

    protected static function boot(){

        parent::boot();

        static::creating(function ($model){

            $model->app_no = static::generateApplicationNo();
        });
    }

    protected static function generateApplicationNo(){
        $lastRecord = static::orderBy('id','desc')->first();
        $nextId = $lastRecord ? $lastRecord->app_no + 1 : 10001;
        return $nextId;

    }
}
