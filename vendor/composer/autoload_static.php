<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit716cfb7e8e08cce78141c4edb9a24f77
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PrettyBlocksTestFieldsBlocks' => __DIR__ . '/../..' . '/classes/PrettyBlocksTestFieldsBlocks.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit716cfb7e8e08cce78141c4edb9a24f77::$classMap;

        }, null, ClassLoader::class);
    }
}
