<?php
spl_autoload_register('celine_autoloader');
function celine_autoloader($class)
{
    $namespace = 'Celine\Theme';

    if (strpos($class, $namespace) !== 0) {
        return;
    }

    $class = str_replace($namespace, '', $class);
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    $directory = get_template_directory();
    $path = $directory . DIRECTORY_SEPARATOR . 'lib' . $class;

    if (file_exists($path)) {
        include_once $path;
    }
}