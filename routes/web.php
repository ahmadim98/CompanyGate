<?php

use Illuminate\Support\Facades\Route;

//here the controllers
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EMonthController;
use App\Http\Controllers\CAwardsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatisticsController;

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

/*
Route::get('/', function () {
    return view('home');
});
*/

Route::get('/',[HomeController::class,'index']);

Route::get('/login', [AuthController::class,'index']);
Route::post('/login', [AuthController::class,'login'])->name('AuthLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('news')->group(function () {
    Route::get('/',function () {
        return view('news/news');
    });

    Route::get('/{id}',[NewsController::class,'NewsPage']);
});

Route::get('/employers', function () {
    return view('employers/employers');
});

Route::prefix('settings')->group(function () {
    
    Route::get('/',[SettingsController::class,'GetSettings']);

    Route::post('/',[SettingsController::class,'SetSettings'])->name('SetSettings');
});


Route::prefix('emonth')->group(function () {
    
    /*Route::get('/', function () {
        return view('emonth');
    });*/

    Route::get('/',[EMonthController::class,'index']);

    Route::post('/add',[EMonthController::class,'store'])->name('AddEMonth');

    Route::delete('/delete',[EMonthController::class,'destroy'])->name('DelEmonth');

    Route::put('/update',[EMonthController::class,'update'])->name('EditEmonth');
    
});

Route::prefix('cawards')->group(function () {

    Route::get('/',[CAwardsController::class,'index']);

    Route::post('/add',[CAwardsController::class,'store'])->name('AddCAwards');

    Route::delete('/delete',[CAwardsController::class,'destroy'])->name('DelCaward');

    Route::put('/update',[CAwardsController::class,'update'])->name('EditCaward');
    
});


Route::get('/statistics', function () {
    return view('statistics');
});

Route::get('/statistics',[StatisticsController::class,'index']);

Route::prefix('managenews')->group(function () {
    Route::get('/', function () {
        return view('news/managenews');
    });

    Route::get('/addnews', function () {
        return view('news/addnews');
    });

    Route::delete('/deletenews',[NewsController::class,'destroy'])->name('DelNews');

    Route::get('/editnews/{id}',[NewsController::class,'editNews']);
});


Route::prefix('manageemployers')->group(function () {
    /*Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });*/

    Route::get('/', function () {
        return view('employers/manageemployers');
    });

    Route::get('/newemployer', function () {
        return view('employers/newemployer');
    });

    Route::post('/newemployer',[EmployerController::class,'store'])->name('NewEmployer');

    Route::delete('/deleteemployer',[EmployerController::class,'destroy'])->name('DelEmployer');

    Route::put('/updateemp/{id}',[EmployerController::class,'update'])->name('UpdateEmployer');

    Route::get('/editemployer/{id}',[EmployerController::class,'editEmployer']);

    
});




Route::prefix('manageusers')->group(function () {
    Route::get('/', function () {
        return view('users/manageusers');
    });

    Route::get('/newuser', function () {
        return view('users/newuser');
    });

    //here the crud operations
    Route::post('/newuser',[UserController::class,'store'])->name('NewUser');

    Route::delete('/deleteuser',[UserController::class,'destroy'])->name('DelUser');

    Route::put('/updateuser/{id}',[UserController::class,'update'])->name('EditUser');

    Route::get('/edituser/{id}',[UserController::class,'editUser']);

});


Route::get('/support-center', function () {
    return view('support-center');
});

Route::get('/welcome', function () {
    return view('welcome');
});


//this route to test the frontend
/*Route::prefix('test')->group(function () {
    /*Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });*/
/*
    Route::get('/', function () {
        return view('home');
    });
});*/

