<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\StudentController::class, 'index']);
Route::get('/addstudent', [App\Http\Controllers\StudentController::class, 'addstudent']);
Route::post('/createStudent', [App\Http\Controllers\StudentController::class, 'storestudent']);
Route::post('/change-status', [App\Http\Controllers\StudentController::class, 'changestatus']);
Route::get('/export-excel', [App\Http\Controllers\StudentController::class, 'exportIntoExcel']);
Route::get('/export-csv', [App\Http\Controllers\StudentController::class, 'exportIntoCSV']);
//Route::get('/import', [App\Http\Controllers\StudentController::class, 'ImportForm']);
Route::post('/import-csv', [App\Http\Controllers\StudentController::class, 'ImportCsv'])->name('student.csv');