<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 22/05/2015
 * Time: 16:16
 */

function application_autoLoader($class = null)
{
    $class = strtolower($class);
    $class_filename = 'class.' . strtolower($class) . '.php';
    $class_root = dirname(__FILE__);
    $cache_file = "{$class_root}/cache/classpaths.cache";
    $path_cache = (file_exists($cache_file)) ? unserialize(file_get_contents($cache_file)) : array();
    if (!is_array($path_cache)) {
        $path_cache = array();
    }

    if (array_key_exists($class, $path_cache)) {
        /* Load class using path from cache file (if the file still exists) */
        if (file_exists($path_cache[$class])) {
            require_once $path_cache[$class];
        }

    } else {
        /* Determine the location of the file within the $class_root and, if found, load and cache it */
        $directories = new RecursiveDirectoryIterator($class_root);
        foreach (new RecursiveIteratorIterator($directories) as $file) {
            if (strtolower($file->getFilename()) == $class_filename) {
                $full_path = $file->getRealPath();
                $path_cache[$class] = $full_path;
                require_once $full_path;
                break;
            }
        }

    }

    $serialized_paths = serialize($path_cache);
    if ($serialized_paths != $path_cache) {
        file_put_contents($cache_file, $serialized_paths);
    }
}


spl_autoload_register('application_autoLoader');



