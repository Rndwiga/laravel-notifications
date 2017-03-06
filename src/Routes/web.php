<?php

Route::get('user/activation/{token}', 'TyondoNotificationsController@activateUser')->name('user.activate');