<?php

require_once 'vendor/autoload.php';
spl_autoload_register(function ($className) {

    try {
        $dirs = ['c', 'm', 'tests'];
        foreach ($dirs as $dir) {
            $fileName = __DIR__ . '/' . $dir . '/' . $className . '.php';

            if (is_file($fileName)) {
                require_once($fileName);
            }
        }

        return true;
    } catch (Exception $e) {
        die ('ERROR: ' . $e->getMessage());
    }
});