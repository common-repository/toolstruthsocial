<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit291608b5274825ccb4a53a26e96bc750
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Abraham\\TwitterOAuth\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Abraham\\TwitterOAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/abraham/twitteroauth/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit291608b5274825ccb4a53a26e96bc750::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit291608b5274825ccb4a53a26e96bc750::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
