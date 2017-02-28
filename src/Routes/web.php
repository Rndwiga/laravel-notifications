<?php

Route::get('user/activation/{token}', 'LaravelNotificationsController@activateUser')->name('user.activate');