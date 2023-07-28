<?php

use admin\Test;

//include_once 'admin/Test.php';
class App
{
    public static function Init(): void
    {
        // если скрипт запускается из браузера и значения $_SERVER и $_GET не пустые, то вызываем метод web
        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            self::web();
        }
    }

    // Роутер!!!
    protected static function web(): void
    {
        $action = 'action_';
        $action .=(isset($_GET['act'])) ? $_GET['act'] : 'index';

        if ($_GET) {
            $controller = match ($_GET['c']) {
                'good' => new C_Catalog(),
                'cart' => new C_Cart(),
                'user' => new C_User(),
                'order' => new C_Order(),
                'test' => new Test(),
                'admin' => new C_Admin(),
                default => new C_Page(),
            };
        } else {
            $controller = new C_Page();
        }

        $controller->Request($action);
    }
}