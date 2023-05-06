<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit94c4a82b122bbd16d73cb16776e3e34a
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit94c4a82b122bbd16d73cb16776e3e34a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit94c4a82b122bbd16d73cb16776e3e34a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}