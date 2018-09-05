<?php

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

Route::get('/', 'PagesController@home')->name('/');

Route::get('/home', 'PagesController@home')->name('home');

Route::get('/new_account', 'PagesController@new_account')->name('new_account_page');

Route::post('/new_account', 'BankingSystemController@new_account')->name('new_account_api');

Route::get('/edit_account', 'PagesController@edit_account')->name('edit_account_page');

Route::post('/edit_account', 'BankingSystemController@edit_account')->name('edit_account_api');

Route::get('/debit_account', 'PagesController@debit_account')->name('debit_account_page');

Route::post('/debit_account', 'BankingSystemController@debit_account')->name('debit_account_api');

Route::get('/credit_account', 'PagesController@credit_account')->name('credit_account_page');

Route::post('/credit_account', 'BankingSystemController@credit_account')->name('credit_account_api');

Route::get('/view_balance', 'PagesController@view_balance')->name('view_balance_page');

Route::post('/view_balance', 'BankingSystemController@view_balance')->name('view_balance_api');
