<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc33f428857a691275dd259565e0dc7f
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc33f428857a691275dd259565e0dc7f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc33f428857a691275dd259565e0dc7f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc33f428857a691275dd259565e0dc7f::$classMap;

        }, null, ClassLoader::class);
    }
}
