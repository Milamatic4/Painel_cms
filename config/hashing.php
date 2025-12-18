<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default hashing driver that should be used
    | by your application. The "bcrypt" algorithm is used by default and is
    | the most secure option. Bcrypt creates a hash string by applying a
    | radix-64 encoding scheme on a random salt and the password.
    |
    | Supported: "bcrypt", "argon2id"
    |
    */

    'driver' => 'bcrypt',

    /*
    |--------------------------------------------------------------------------
    | Bcrypt Options
    |--------------------------------------------------------------------------
    |
    | You may specify the configuration options that should be used when
    | passwords are hashed using the Bcrypt algorithm. This will allow you
    | to control the hash algorithm's complexity and performance.
    |
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon2id Options
    |--------------------------------------------------------------------------
    |
    | You may specify the configuration options that should be used when
    | passwords are hashed using the Argon2id algorithm. These will allow
    | you to control the memory and time required to compute a hash.
    |
    */

    'argon2id' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

];
