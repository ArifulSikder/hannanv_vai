<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'language', 'as' => 'language.'], function () {
    Route::get('list', ['middleware' => 'acl:view_language_list', 'as' => 'index', 'uses' => '\App\Http\Controllers\Admin\LanguageController@index']);
    //Route::get('', 'LanguageController@')->name('index');
    //Route::post('store', 'LanguageController@')->name('');
    Route::post('store', ['middleware' => 'acl:store_language', 'as' => 'store', 'uses' => '\App\Http\Controllers\Admin\LanguageController@langStore']);
    // Route::post('', 'LanguageController@langDel')->name('delete');
    Route::post('delete/{id}', ['middleware' => 'acl:delete_language', 'as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\LanguageController@langDel']);
    // Route::post('', 'LanguageController@langUpdate')->name('manage.update');
    Route::post('update/{id}', ['middleware' => 'acl:update_language', 'as' => 'manage.update', 'uses' => '\App\Http\Controllers\Admin\LanguageController@langUpdate']);
    // Route::get('', 'LanguageController@translateLanguage')->name('');
    Route::get('translate/{id}', ['middleware' => 'acl:view_language_list', 'as' => 'key', 'uses' => '\App\Http\Controllers\Admin\LanguageController@translateLanguage']);
    //Route::get('', 'LanguageController@edit')->name('edit');
    Route::get('edit/{id}', ['middleware' => 'acl:edit_language', 'as' => 'edit', 'uses' => '\App\Http\Controllers\Admin\LanguageController@edit']);
    // Route::post('', 'LanguageController@langImport')->name('import');
    Route::post('import', ['middleware' => 'acl:import_language', 'as' => 'import', 'uses' => '\App\Http\Controllers\Admin\LanguageController@langImport']);


    Route::group(['prefix' => 'key', 'as' => 'key.'], function () {
        Route::post('store/{id}', '\App\Http\Controllers\Admin\LanguageController@storeLanguageJson')->name('store');
        Route::post('delete/{id}', '\App\Http\Controllers\Admin\LanguageController@deleteLanguageJson')->name('delete');
        Route::post('update/{id}', '\App\Http\Controllers\Admin\LanguageController@updateLanguageJson')->name('update');
    });
});
