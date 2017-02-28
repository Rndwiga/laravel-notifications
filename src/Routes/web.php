<?php

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');