<?php
//use App\Http\Controllers\EstudianteController;
//use App\Http\Controllers\GrupoController;
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

Route::get('/', function () {
    return view('auth.login');
});
/*Route::get('/estudiante', function () {
    return view('estudiante.index');
});

Route::get('/estudiante/create',[ EstudianteController::class,'create']);
*/
//Route::resource('estudiante',EstudianteController::class);

Route::resource('estudiante', EstudianteController::class)->middleware('auth');

Route::resource('grupo', GrupoController::class)->middleware('auth');

//elimina el registro de cuenta y la recuperacion de contraseña
Auth::routes(['register'=>false, 'reset'=>false]);


Route::get('/home', 'EstudianteController@index')->name('home');

Route::group([ 'middleware' => 'auth'], function(){
	Route::get('/','EstudianteController@index')->name('home');
});


//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

