<?php

namespace Celine\Theme\Helpers;

/**
 * Undocumented class
 */
class EnqueueHelper
{

    /**
     * Get Hash of file to get a version number
     *
     * @param string $path
     * @param string $default
     *
     * @return void
     */
    public static function getVersion($path, $default = '1.0.0')
    {
        $hash = sha1_file($path);
        return $hash ? substr($hash, -8, -1) : $default;
    }

    /**
     * Undocumented function
     *
     * @param [type] $file
     * @return void
     */
    public static function getMinifiedFilename($file)
    {
        $index = strpos($file, ".css");
        $minFile = substr_replace($file, ".min.css", $index);
        return file_exists($minFile) ? $minFile : $file;
    }
}