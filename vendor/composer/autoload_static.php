<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite13f1ad0639f121c90d3ff74fb052be4
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'm3assy\\nationals\\Tests\\' => 23,
            'm3assy\\nationals\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'm3assy\\nationals\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'm3assy\\nationals\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite13f1ad0639f121c90d3ff74fb052be4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite13f1ad0639f121c90d3ff74fb052be4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}