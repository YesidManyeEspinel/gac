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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('client/{client}','ClienteController@showClient')->name('cliente.show');
Route::put('client/{client}','ClienteController@editClient')->name('cliente.edit');
Route::post('client','ClienteController@addClient')->name('cliente.store');
Route::post('searchclient','ClienteController@searchClient')->name('cliente.search');
Route::post('addpdf/{client}','ClienteController@addPdf')->name('cliente.pdf');
Route::post('addcredit/{client}','ClienteController@addCredit')->name('cliente.credit');
Route::get('updcredit/{client}','ClienteController@updCredit')->name('credit.edit');
