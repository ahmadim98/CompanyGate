<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//controllers here
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EMonthController;
use App\Http\Controllers\CAwardsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//don't forget to include the auth middleware !
Route::get('/getemployers',[EmployerController::class,'getAllEmployers']);

Route::get('/getusers',[UserController::class,'getAllUsers']);

if(config('app.env') != 'preview'){
    Route::post('/managenews/addnews',[NewsController::class,'store'])->name('AddNews');

    Route::post('/updatenews/{id}',[NewsController::class,'UpdateNews'])->name('UpdateNews');
}else{
    Route::post('/managenews/addnews',[NewsController::class,'emptyForm'])->name('AddNews');
    Route::post('/updatenews/{id}',[NewsController::class,'emptyForm'])->name('UpdateNews');
}


Route::get('/getnews',[NewsController::class,'getAllNews']);

Route::get('/emonth/{id}',[EMonthController::class,'getEmonth'])->name('getEmonth');

Route::get('/cawards/{id}',[CAwardsController::class,'getCaward'])->name('getCaward');

