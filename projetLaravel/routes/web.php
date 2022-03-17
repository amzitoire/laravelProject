<?php

use App\Models\Correction;
use App\Models\Epreuve;
use Illuminate\Support\Facades\Route;


/*
 *
 */
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

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



Auth::routes();
#admin
Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('admin');
Route::resource('myUsers', App\Http\Controllers\MyUserController::class);
Route::resource('epreuves', App\Http\Controllers\EpreuveController::class);
Route::resource('corrections', App\Http\Controllers\CorrectionController::class);

#visiteur
Route::get('/', [App\Http\Controllers\guestController::class, 'welcome'])->name('welcome');
#users
Route::get('/home',  [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('bibliotheque/corrections/{id}/epreuve',  [App\Http\Controllers\HomeController::class, 'showCorrections'])->name('corrections');
#epreuve
Route::get('/download/{id}/epreuve', [App\Http\Controllers\EpreuveController::class, 'download'])->name('downloadEpreuve');
#correction
Route::get('/download/{id}/correction', [App\Http\Controllers\CorrectionController::class, 'download'])->name('downloadCorrection');



