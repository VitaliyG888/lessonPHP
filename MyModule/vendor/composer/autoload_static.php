<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit97a1768c9e044724cf740941207a8e84
{
    public static $prefixLengthsPsr4 = array (
        'k' => 
        array (
            'kernel\\' => 7,
        ),
        'a' => 
        array (
            'appTelegram\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'kernel\\' => 
        array (
            0 => __DIR__ . '/..' . '/kernel',
        ),
        'appTelegram\\' => 
        array (
            0 => __DIR__ . '/../..' . '/appTelegram',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit97a1768c9e044724cf740941207a8e84::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit97a1768c9e044724cf740941207a8e84::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit97a1768c9e044724cf740941207a8e84::$classMap;

        }, null, ClassLoader::class);
    }
}