<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, 'index']);

Route::get('/view_course/{id}',[HomeController::class, 'view_course']) ->name('view.course');

Route::get('/view_form',[HomeController::class, 'view_form']) ->name('view.form');



//when selection the institute, this get the course nemes
Route::get('get_courses/{id}', [HomeController::class,'getCourses'])->name('getCourses');

//when selection the institute, this get the course nemes
Route::get('get_location/{id}', [HomeController::class,'getLocation'])->name('getLocation');

//when selection the province, this get the district
Route::get('get_district/{id}', [HomeController::class,'getDistrict'])->name('getDistrict');

//when selection the District, this get the dsoffice
Route::get('get_dsoffice/{id}', [HomeController::class,'getDsoffice'])->name('getDsoffice');


//when selection the Al Stream, this get subjects
Route::get('get_Subjects/{id}', [HomeController::class,'getSubjects'])->name('getSubjects');

Route::get('get_GenEnglish/{id}', [HomeController::class,'getGenEnglish'])->name('getGenEnglish');

Route::get('get_ComTest/{id}', [HomeController::class,'getComTest'])->name('getComTest');

//chacking courses and nic
Route::post('checkAvail', [HomeController::class,'checkAvail'])->name('checkAvail');

//submit personal information page
Route::post('educationalQual', [HomeController::class,'educationalQual'])->name('educationalQual');

//submit educational qualification and submit for final page
Route::post('completeApp', [HomeController::class,'completeApp'])->name('completeApp');

//submit educational qualification and submit for final page
Route::post('submitApp', [HomeController::class,'submitApp'])->name('submitApp');

Route::middleware(CheckDirectAccess::class)->get('/protected-page', function () {
    // Logic for the protected page
});
