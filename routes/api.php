<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
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

Route::get('/ListConsult',[ConsultController::class, 'ListConsult'])->name('ListConsult');
Route::get('/ListAdmin',[AdminController::class, 'ListAdmin'])->name('ListAdmin');
Route::get('/ListClient',[ClientController::class, 'ListClient'])->name('ListClient');
Route::get('/ListClientoptin',[ClientController::class, 'ListClientOptIn'])->name('ListClientOI');
Route::get('/ListClientoptout',[ClientController::class, 'ListClientOptOut'])->name('ListClientOO');
Route::post('/addConsult',[ConsultController::class, 'AddConsult'])->name('AddConsult');
Route::get('/delConsult/{id}',[ConsultController::class, 'destroy'])->name('delConsult');
Route::post('/updateconsultant/{id}',[ConsultController::class, 'updateconsultant']);
Route::post('/addclient',[ClientController::class, 'AddClient'])->name('AddClient');


Route::group([
    'middleware' => 'api',
], function ($router) {
    $router->post('/login', [AuthController::class, 'login']);
    $router->post('/register', [AuthController::class, 'register']);
    $router->post('/logout', [AuthController::class, 'logout']);
    $router->post('/refresh', [AuthController::class, 'refresh']);
    $router->get('/user-profile', [AuthController::class, 'userProfile']);


    Route::post('/updateclient/{id}',[ClientController::class, 'updateclient'])->middleware('Consultant');
    //Route::post('/addclient',[ClientController::class, 'AddClient'])->name('AddClient')->middleware('Consultant');
    //Route::get('/CreatCons', function () {
        //
    //})->middleware('Admin');
});
