<?php

/**
 * Uygulama ile ilgili konfigürasyon dosyasıdır.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Database Engine
    |--------------------------------------------------------------------------
    |

    */
    'engine' => "mysql", // mysql, mongodb

    /*
    |--------------------------------------------------------------------------
    | Database Configuration
    |--------------------------------------------------------------------------
    |
    | Veritabanı sürücüsünde kullanılacak olan bağlantı bilgileridir.
    |
    */
    'host' => 'teknasyon.project',
    'port' => 80,
    'user' => 'root',
    'password' => '',
    'options' => [],

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |

    */
    'logging' => 'file', // database, file

];

