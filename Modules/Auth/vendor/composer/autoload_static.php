<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c9a4e57e62b3af0065d99f8ed11e52f
{
    public static $prefixLengthsPsr4 = array (
        'M' =>
        array (
            'Modules\\Auth\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Auth\\' =>
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Modules\\Auth\\Database\\Seeders\\AuthDatabaseSeeder' => __DIR__ . '/../..' . '/Database/Seeders/AuthDatabaseSeeder.php',
        'Modules\\Auth\\Http\\Controllers\\Admin\\AuthController' => __DIR__ . '/../..' . '/Http/Controllers/Admin/AuthController.php',
        'Modules\\Auth\\Http\\Requests\\Admin\\AdminloginRequest' => __DIR__ . '/../..',
        'Modules\\Auth\\Providers\\AuthServiceProvider' => __DIR__ . '/../..' . '/Providers/AuthServiceProvider.php',
        'Modules\\Auth\\Providers\\RouteServiceProvider' => __DIR__ . '/../..' . '/Providers/RouteServiceProvider.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c9a4e57e62b3af0065d99f8ed11e52f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c9a4e57e62b3af0065d99f8ed11e52f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4c9a4e57e62b3af0065d99f8ed11e52f::$classMap;

        }, null, ClassLoader::class);
    }
}