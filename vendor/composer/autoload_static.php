<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc2c371f4cb8eadaad90b00bbfc8daf4
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'lbs\\' => 4,
        ),
        'S' => 
        array (
            'Slim\\Tests\\' => 11,
            'Slim\\' => 5,
        ),
        'P' => 
        array (
            'Psr\\Http\\Server\\' => 16,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'lbs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/lbs',
        ),
        'Slim\\Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/tests',
        ),
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/Slim',
        ),
        'Psr\\Http\\Server\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-server-handler/src',
            1 => __DIR__ . '/..' . '/psr/http-server-middleware/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-factory/src',
            1 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc2c371f4cb8eadaad90b00bbfc8daf4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc2c371f4cb8eadaad90b00bbfc8daf4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
