<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit515ef2d0b704ccfad7c0cbc3a4be8a7a
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit515ef2d0b704ccfad7c0cbc3a4be8a7a::$classMap;

        }, null, ClassLoader::class);
    }
}
