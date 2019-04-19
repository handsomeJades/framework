<?php
/**
 * Created by PhpStorm.
 * User: shitingyu
 * Date: 2019/4/19
 * Time: 14:00
 */

error_reporting(E_ALL);                                  //错误级别
date_default_timezone_set("Asia/Shanghai");   //时区

define('DS', DIRECTORY_SEPARATOR);
define('SOURCE_DIR', dirname(__FILE__) . DS);
define('CORE_DIR', SOURCE_DIR . 'Core' . DS);             //核心Core目录
define('CONTROLLER_DIR', SOURCE_DIR . 'Controller' . DS); //Controller目录
define('COMPOMENT_DIR', SOURCE_DIR . 'Component' . DS);   //Component目录
define('MODEL_DIR', SOURCE_DIR . 'Model' . DS);           //Model目录

require_once(CORE_DIR . 'App.php');

//类自动加载
spl_autoload_register(function ($className) {
    if(preg_match('/.*Controller$/',$className,$matches)){
        $path=CONTROLLER_DIR .$className. '.php';
    }
    //component
    //model

    if(!is_file($path)){
        throw new Exception('can not find the Class:'.$className);
    }
});


try {
    $app = new App();
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}

