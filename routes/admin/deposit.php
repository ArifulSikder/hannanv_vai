<?php

use Illuminate\Support\Facades\Route;
    Route::group(['prefix' => 'deposit', 'as' => 'deposit.'], function () {
        Route::get('list', 'DepositController@deposit')->name('list');
        Route::get('pending', 'DepositController@pending')->name('pending');
        Route::get('rejected', 'DepositController@rejected')->name('rejected');
        Route::get('approved', 'DepositController@approved')->name('approved');
        Route::get('successful', 'DepositController@successful')->name('successful');
        Route::get('details/{id}', 'DepositController@details')->name('details');

        Route::post('reject', 'DepositController@reject')->name('reject');
        Route::post('approve', 'DepositController@approve')->name('approve');
        Route::get('via/{method}/{type?}', 'DepositController@depositViaMethod')->name('method');
        Route::get('{scope}/search', 'DepositController@search')->name('search');
        Route::get('date-search/{scope}', 'DepositController@dateSearch')->name('dateSearch');
    });
    Route::group(['prefix' => 'withdraw', 'as' => 'withdraw.'], function () {
        Route::get('pending', 'WithdrawalController@pending')->name('pending');
        Route::get('approved', 'WithdrawalController@approved')->name('approved');
        Route::get('rejected', 'WithdrawalController@rejected')->name('rejected');
        Route::get('log', 'WithdrawalController@log')->name('log');
        Route::get('via/{method_id}/{type?}', 'WithdrawalController@logViaMethod')->name('method');
        Route::get('{scope}/search', 'WithdrawalController@search')->name('search');
        Route::get('date-search/{scope}', 'WithdrawalController@dateSearch')->name('dateSearch');
        Route::get('details/{id}', 'WithdrawalController@details')->name('details');
        Route::post('approve', 'WithdrawalController@approve')->name('approve');
        Route::post('reject', 'WithdrawalController@reject')->name('reject');

        // Withdraw Method
        Route::get('method/', 'WithdrawMethodController@methods')->name('method.index');
        Route::get('method/create', 'WithdrawMethodController@create')->name('method.create');
        Route::post('method/create', 'WithdrawMethodController@store')->name('method.store');
        Route::get('method/edit/{id}', 'WithdrawMethodController@edit')->name('method.edit');
        Route::post('method/edit/{id}', 'WithdrawMethodController@update')->name('method.update');
        Route::post('method/activate', 'WithdrawMethodController@activate')->name('method.activate');
        Route::post('method/deactivate', 'WithdrawMethodController@deactivate')->name('method.deactivate');
    });
    Route::group(['prefix' => 'agent', 'as' => 'agent.'], function () {
        Route::get('list', 'ManageAgentController@allAgent')->name('all');
        Route::get('active', 'ManageAgentController@activeAgent')->name('active');
        Route::get('banned', 'ManageAgentController@bannedAgent')->name('banned');
        Route::get('email-verified', 'ManageAgentController@emailVerifiedAgent')->name('email.verified');
        Route::get('email-unverified', 'ManageAgentController@emailUnverifiedAgent')->name('email.unverified');
        Route::get('sms-unverified', 'ManageAgentController@smsUnverifiedAgent')->name('sms.unverified');
        Route::get('sms-verified', 'ManageAgentController@smsVerifiedAgent')->name('sms.verified');
        Route::get('with-balance', 'ManageAgentController@agentWithBalance')->name('with.balance');

        Route::get('{scope}/search', 'ManageAgentController@search')->name('search');
        Route::get('detail/{id}', 'ManageAgentController@detail')->name('detail');
        Route::post('update/{id}', 'ManageAgentController@update')->name('update');
        Route::post('add-sub-balance/{id}', 'ManageAgentController@addSubBalance')->name('add.sub.balance');
        Route::get('send-email/{id}', 'ManageAgentController@showEmailSingleForm')->name('email.single');
        Route::post('send-email/{id}', 'ManageAgentController@sendEmailSingle')->name('email.single');
        Route::get('login/{id}', 'ManageAgentController@login')->name('login');
        Route::get('transactions/{id}', 'ManageAgentController@transactions')->name('transactions');
        Route::get('deposits/{id}', 'ManageAgentController@deposits')->name('deposits');
        Route::get('deposits/via/{method}/{type?}/{agentId}', 'ManageAgentController@depositViaMethod')->name('deposits.method');
        Route::get('withdrawals/{id}', 'ManageAgentController@withdrawals')->name('withdrawals');
        Route::get('withdrawals/via/{method}/{type?}/{agentId}', 'ManageAgentController@withdrawalsViaMethod')->name('withdrawals.method');
});
