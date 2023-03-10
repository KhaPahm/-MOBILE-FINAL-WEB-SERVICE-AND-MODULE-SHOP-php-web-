<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08c9f2727fcdf0e1677c04f9f52bfd2d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08c9f2727fcdf0e1677c04f9f52bfd2d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08c9f2727fcdf0e1677c04f9f52bfd2d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit08c9f2727fcdf0e1677c04f9f52bfd2d::$classMap;

        }, null, ClassLoader::class);
    }
}
