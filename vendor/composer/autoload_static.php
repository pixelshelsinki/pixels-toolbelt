<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite868d68a8c39c6f04ac8e8c3f200e763
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pixels\\Toolbelt\\' => 16,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pixels\\Toolbelt\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite868d68a8c39c6f04ac8e8c3f200e763::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite868d68a8c39c6f04ac8e8c3f200e763::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
