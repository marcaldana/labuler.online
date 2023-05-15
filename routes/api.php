<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LabtypesController;
use App\Http\Controllers\BuildinginfosController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LabscheduleController;

use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Auth::routes();

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('login', 'AuthController@login');
Route::post('login', [AuthController::class,'login']);

Route::post('register', [AuthController::class,'register']);
Route::post('checkemail', [AuthController::class,'checkemail']);

Route::post('forgotpassword', [AuthController::class,'forgotpassword']);

//Route::get('getUsers', [AuthController::class,'getUsers']);

// Route::group(['middleware'=>'api','prefix'=>'auth'],function(){
Route::group(['middleware'=>'api'],function(){
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    // Route::get('userdata', [UserController::class,'index']);
    //Route::post('getUsers', [AuthController::class,'getUsers']);
    // Route::get('getUsers', [AuthController::class,'getUsers']);
    // Route::group(['prefix' => 'user'], function ()
    // {
    //     //Route::get('get', ['as' => 'getUser', 'uses' => 'UserController@getUser']);
    //     Route::get('getUsers', [AuthController::class,'getUsers']);
    // });
    // Route::apiResource('userdata', UserController::class)->middleware('auth:api');
    //Route::apiResource('userall', UserController::class);
    //Route::apiResource('useralldata', UserController::class)->middleware('auth:api');
    // Route::get('useralldata', [UserController::class,'index']);
    Route::get('useralldata', [UserController::class,'index']);
    // Route definition...
    Route::get('/users', [UserController::class, 'index']);
    //Route::post('/users/updstatus', [UserController::class, 'updstatus']);
    // Route::get('/users/updstatus/{id}', function (string $id) {
    //     // Only executed if {id} is numeric...
    // });
    Route::post('/users/updstatus',  [UserController::class, 'updstatus']);
    Route::post('/users/getUser',  [UserController::class, 'getUser']);
    Route::get('/users/getAllFaculty',  [UserController::class, 'getAllFaculty']);
    
    Route::post('/department/saveData',  [DepartmentController::class, 'saveData']);
    Route::get('/department/getAllData',  [DepartmentController::class, 'getAllData']);
    Route::post('/department/getData',  [DepartmentController::class, 'getData']);

    Route::post('/courses/saveData',  [CoursesController::class, 'saveData']);
    Route::get('/courses/getAllData',  [CoursesController::class, 'getAllData']);
    Route::post('/courses/getData',  [CoursesController::class, 'getData']);
    
    Route::post('/labtypes/saveData',  [LabtypesController::class, 'saveData']);
    Route::get('/labtypes/getAllData',  [LabtypesController::class, 'getAllData']);
    Route::post('/labtypes/getData',  [LabtypesController::class, 'getData']);

    Route::post('/buildinginfos/saveData',  [BuildinginfosController::class, 'saveData']);
    Route::get('/buildinginfos/getAllData',  [BuildinginfosController::class, 'getAllData']);
    Route::post('/buildinginfos/getData',  [BuildinginfosController::class, 'getData']);

    Route::post('/term/saveData',  [TermController::class, 'saveData']);
    Route::get('/term/getAllData',  [TermController::class, 'getAllData']);
    Route::post('/term/getData',  [TermController::class, 'getData']);

    Route::post('/lab/saveData',  [LabController::class, 'saveData']);
    Route::get('/lab/getAllData',  [LabController::class, 'getAllData']);
    Route::post('/lab/getData',  [LabController::class, 'getData']);
    Route::get('/lab/getAllRoomnumber',  [LabController::class, 'getAllRoomnumber']);
    

    Route::post('/labschedule/saveData',  [LabscheduleController::class, 'saveData']);
    Route::get('/labschedule/getAllData',  [LabscheduleController::class, 'getAllData']);
    Route::get('/labschedule/getAllDataNew',  [LabscheduleController::class, 'getAllDataNew']);
    Route::post('/labschedule/getData',  [LabscheduleController::class, 'getData']);  
    Route::post('/labschedule/getCourseByTerm',  [LabscheduleController::class, 'getCourseByTerm']);  
    Route::post('/labschedule/getCourseByDept',  [LabscheduleController::class, 'getCourseByDept']);
    Route::post('/labschedule/getLabschedulebyCourse',  [LabscheduleController::class, 'getLabschedulebyCourse']);
    Route::post('/labschedule/getCourseBySearchData',  [LabscheduleController::class, 'getCourseBySearchData']);
    Route::post('/labschedule/getDepartmentByTerm',  [LabscheduleController::class, 'getDepartmentByTerm']);
    Route::post('/labschedule/getCourseByDepartment',  [LabscheduleController::class, 'getCourseByDepartment']);
    Route::post('/labschedule/getDataFacultyByTerm',  [LabscheduleController::class, 'getDataFacultyByTerm']);
    Route::post('/labschedule/getCoursebyFaculty',  [LabscheduleController::class, 'getCoursebyFaculty']);
         

    Route::post('/labschedule/getCourseByDeptFaculty',  [LabscheduleController::class, 'getCourseByDeptFaculty']);
});

//Route::get('useralldata', [UserController::class,'index']);
Route::apiResource('userall', UserController::class);

Route::get('userdata', [UserController::class,'index'])->middleware('auth:api');



// Route::apiResource('useralldata', UserController::class)->middleware('auth:api');
// Route::apiResource('useralldata', UserController::class)->middleware('auth:api');
/**
 * User Module
 */
// Route::apiResource('user',UserController::class);
//Route::resource('user', UserController::class);
//Route::get('getUsers', [UserController::class, 'index']);

// Route::get('users', function () {

//     return response(User::all(),200);

// });

// Route::get('users', 'UserController@index');
// Route::get('products', function () {

//     return response(['Product 1', 'Product 2', 'Product 3'],200);

// });
// Route::get('users', 'UserController@index');

//Route::apiResource('/usersd', UserController::class)->middleware('auth:api');

