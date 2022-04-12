<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EquipmentsController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\LabapplicationsController;
use App\Models\Labapplications;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('login', [AuthController::class, 'signin']);

Route::post('register', [AuthController::class, 'signup']);

// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('events', EventController::class);
// });

Route::group(['middleware'=>["auth:sanctum","isAdmin"]],function(){
    Route::post('/equipments/create',[EquipmentsController::class, 'store']);
    Route::put('/equipments/{id}/update',[EquipmentsController::class, 'update']);
    Route::post('/equipments/{id}/delete',[EquipmentsController::class, 'delete']);
});

Route::group(['middleware'=>["auth:sanctum","isLabIncharge"]],function(){
    Route::get('/applications',[LabapplicationsController::class, 'index']);
    Route::get('/applications/{id}',[LabapplicationsController::class, 'details']);
    Route::patch('/applications/{id}',[LabapplicationsController::class, 'update']);
    Route::post('/applications/delete/{id}',[LabapplicationsController::class, 'delete']);
});

Route::post('/applications/create',[LabapplicationsController::class, 'store']);
Route::get('/user/applications/{email}',[LabapplicationsController::class, 'findUserApplication']);

Route::post('/addEvents',[EventController::class, 'addEvents']); //???


Route::get('/events',[EventController::class, 'list']);
Route::delete('/delete/{id}',[EventController::class,'delete']);
Route::put('/updateProduct/{id}',[EventController::class,'updateProduct']);
Route::get('/equipments',[EquipmentsController::class, 'index']);
Route::get('/equipments/{id}',[EquipmentsController::class, 'showEvent']);

Route::get('/list',[EventController::class,'list']);
Route::get('/flagshipList',[EventController::class,'flagshipList']);
Route::get('/micList',[EventController::class,'micList']);
Route::get('/OthersList',[EventController::class,'OthersList']);


//routing for lab applications



