<?php
/**
 * Created by PhpStorm.
 * Date: 2019/4/20
 * Time: 14:37
 */

class Component
{
    private static $_pool = array();

    public static function make($objName)
    {
        $componentPath = str_replace('\\', '/', COMPOMENT_DIR . $objName . '.php');
        if (!is_file($componentPath)) {
            throw new Exception('can not find the Class:' . $objName);
        }
        require_once $componentPath;

        if (isset($_pool[$objName])) {
            return self::$_pool[$objName];
        }

        self::$_pool[$objName] = new $objName;
        return self::$_pool[$objName];
    }
}