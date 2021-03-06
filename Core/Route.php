<?php

final class Route
{
    /**
     * 路由分发
     */
    public static function dispatch()
    {
        $requestUri = $_SERVER['REQUEST_URI'];

        $modules = explode('/', $requestUri);
        $modules = array_filter($modules, 'strlen');

        array_walk($modules,
            function (&$module) {
                $module = ucfirst($module);
            }
        );

        //确定动作
        $action = array_pop($modules);

        //确定Controller路径
        $controllerPath = 'index.php';
        if (count($modules) > 0) {
            $controllerPath = implode(DS, $modules) . '.php';
        }

        $controllerPath = CONTROLLER_DIR . $controllerPath;
        if (!is_file($controllerPath)) {
            throw new Exception('can not find the file:' . $controllerPath);
        }

        require_once $controllerPath;

        //加载类名
        $className = array_pop($modules);
        if (!class_exists($className)) {
            throw new Exception("can not find the class : {$className}");
        }

        $obj = new $className;

        if (!method_exists($obj, $action)) {
            throw new Exception("can not find the method {$action} of {$className}: ");
        }

        //执行动作
        $obj->$action();

    }
}