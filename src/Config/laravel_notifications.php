<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Overview of config
    |--------------------------------------------------------------------------
    |
    */

    'options' => [
        'configuration'    => true,
        'model'    => Tyondo\Mnara\Models\User::class,
        'user_activations_table'    => 'user_activations',
        'resend_after'    => 24,
    ]
];