<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd436d6b7daa2987a8f1642cd0389ab42
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'ElephantIO\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ElephantIO\\' => 
        array (
            0 => __DIR__ . '/..' . '/wisembly/elephant.io/src',
            1 => __DIR__ . '/..' . '/wisembly/elephant.io/test',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 
            array (
                0 => __DIR__ . '/..' . '/psr/log',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd436d6b7daa2987a8f1642cd0389ab42::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd436d6b7daa2987a8f1642cd0389ab42::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd436d6b7daa2987a8f1642cd0389ab42::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
